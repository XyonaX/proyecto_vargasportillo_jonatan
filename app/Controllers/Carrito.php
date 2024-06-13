<?php

namespace App\Controllers;

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
}
