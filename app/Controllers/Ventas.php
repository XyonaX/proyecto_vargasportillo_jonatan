<?php

namespace App\Controllers;

use App\Models\DetalleVenta_model;
use App\Models\Ventas_model;

class Ventas extends BaseController
{
    public function index()
    {
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');
        $data['titulo'] = 'Ventas';

        $venta = new Ventas_model();
        $data['ventas'] = $venta->join('usuarios', 'usuarios.usuario_id = ventas.id_cliente')
            ->paginate(10); // Reutilizar paginación existente
        $data['pager'] = $venta->pager;

        return view('templates/header', $data)
            . view('ventas', $data)
            . view('templates/footer');
    }

    public function listar_detalle_ventas($id = NULL)
    {
        $venta = new Ventas_model();
        $detalle_venta = new DetalleVenta_model();
        $data['titulo'] = "Detalle de Ventas";

        $data['ventas'] = $venta->where('venta_id', $id)
            ->join('usuarios', 'usuarios.usuario_id = ventas.id_cliente')
            ->first();
        $data['detalle_venta'] = $detalle_venta->where('id_venta', $id)
            ->join('productos', 'productos.id_producto = detalle_venta.id_producto')
            ->findAll();

        return view('templates/header', $data)
            . view('listar_detalle_ventas', $data)
            . view('templates/footer');
    }
}
