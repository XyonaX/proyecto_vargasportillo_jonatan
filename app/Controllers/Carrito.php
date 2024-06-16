<?php

namespace App\Controllers;

use App\Models\DetalleVenta_model;
use App\Models\Products_model;
use App\Models\Ventas_model;

class Carrito extends BaseController {

    public function index() {
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');

        $cart = \Config\Services::cart();
        $data['titulo'] = 'Carrito de Compras';

        return view('templates/header', $data)
            . view('carrito', $data)
            . view('templates/footer');
    }

    public function agregar_carrito() {
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();

        $data = [
            'id' => $request->getPost('id'),
            'name' => $request->getPost('name'),
            'price' => $request->getPost('precio'),
            'qty' => 1
        ];

        $cart->insert($data);
        return redirect()->route('carrito');
    }

    public function eliminar_item($rowid) {
        $cart = \Config\Services::cart();
        $contents = $cart->contents();

        if (isset($contents[$rowid])) {
            $item = $contents[$rowid];
            if ($item['qty'] > 1) {
                $cart->update([
                    'rowid' => $rowid,
                    'qty' => $item['qty'] - 1
                ]);
            } else {
                $cart->remove($rowid);
            }
        }

        return redirect()->route('carrito');
    }

    public function eliminar_carrito(){
        $cart = \Config\Services::cart();

        $cart->destroy();

        return redirect()->route('carrito');
    }

    public function guardar_venta(){
        $cart = \Config\Services::cart();
        $ventas = new Ventas_model();
        $detalle = new DetalleVenta_model();
        $productos = new Products_model();

        $cart1 = $cart->contents();

        foreach($cart1 as $item){
            $producto = $productos->where('id_producto',$item['id'])->first();
            if($producto['cantidad_producto'] < $item['qty']){
                return redirect()->route('carrito');
            }
        }

        $data = array(
            'id_cliente' => session('usuario_id'),
            'venta_fecha' => date('Y-m-d'),
        );

        $venta_id = $ventas->insert($data);
        $cart1 = $cart->contents();
        foreach($cart1 as $item){
            $detalle_venta = array(
                'id_venta' => $venta_id,
                'id_producto' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio' => $item['price']

            );

            $producto = $productos->where('id_producto',$item['id'])->first();
            $data = [
                'cantidad_producto' => $producto['cantidad_producto'] - $item['qty'],
            ];

            //Actualiza el stock del producto
            $productos->update($item['id'],$data);
            //Insertar el detalle de Venta
            $detalle->insert($detalle_venta);
        }
        $cart->destroy();
        return redirect()->route('products');
    }
}
