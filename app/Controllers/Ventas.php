<?php

namespace App\Controllers;

use App\Models\DetalleVenta_model;
use App\Models\Products_model;
use App\Models\Ventas_model;

class Ventas extends BaseController {

    public function index() {
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');

        $data['titulo'] = 'Ventas';

        return view('templates/header', $data)
        . view('ventas', $data)
        . view('templates/footer');
    }

    
}
