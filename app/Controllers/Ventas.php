<?php

namespace App\Controllers;

use App\Models\DetalleVenta_model;
use App\Models\Products_model;
use App\Models\Ventas_model;
use App\Models\Users_model;

class Ventas extends BaseController
{
    public function index()
    {
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');
        $data['titulo'] = 'Ventas';

        $ventaModel = new Ventas_model();
        $data['ventas'] = $ventaModel->join('usuarios', 'usuarios.usuario_id = ventas.id_cliente')
            ->paginate(10); // Reutilizar paginación existente
        $data['pager'] = $ventaModel->pager;

        return view('templates/header', $data)
            . view('ventas', $data)
            . view('templates/footer');
    }

    public function factura($id = NULL)
    {
        $session = session();
        $ventaModel = new Ventas_model();
        $detalleVentaModel = new DetalleVenta_model();
        $usersModel = new Users_model();
        $productosModel = new Products_model();

        $venta = $ventaModel->find($id);
        if (!$venta) {
            // Manejo de error si la venta no existe
            throw new \RuntimeException("Venta con ID {$id} no encontrada");
        }

        $detalleVenta = $detalleVentaModel->where('id_venta', $id)->findAll();

        // Calcular el total de la venta sumando los subtotales de cada detalle
        $totalVenta = 0;
        foreach ($detalleVenta as &$detalle) {
            $subtotal = $detalle['detalle_cantidad'] * $detalle['detalle_precio'];
            $totalVenta += $subtotal;

            // Obtener nombre del producto para cada detalle de venta
            $producto = $productosModel->find($detalle['id_producto']);
            if ($producto) {
                $detalle['nombre_producto'] = $producto['nombre_producto']; // Ajusta según el campo de nombre en tu tabla de productos
            } else {
                $detalle['nombre_producto'] = 'Producto no encontrado'; // Manejo de caso donde el producto no existe (opcional)
            }
        }

        // Obtener datos del usuario asociado a la venta
        $usuario = $usersModel->find($venta['id_cliente']); // Asumiendo que 'id_cliente' es la clave foránea que une ventas con usuarios

        $data = [
            'venta' => $venta,
            'detalleVenta' => $detalleVenta,
            'usuario' => $usuario, // Pasamos los datos del usuario a la vista
            'total_venta' => $totalVenta, // Pasamos el total de la venta a la vista
            'titulo' => 'Detalle de Venta', // Título de la página
            'rol_id' => $session->get('rol_id'),
            'isLoggedIn' => $session->get('isLoggedIn'),
            'usuario_nombre' => $session->get('usuario_nombre'),
        ];

        return view('templates/header', $data)
            . view('listar_detalle_ventas', $data)
            . view('templates/footer');
    }
}
