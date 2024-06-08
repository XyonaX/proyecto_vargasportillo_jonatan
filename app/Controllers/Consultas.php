<?php

namespace App\Controllers;


use App\Models\Consulta_model;

class Consultas extends BaseController {


    public function index() {
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');


    }
}