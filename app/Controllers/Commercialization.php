<?php

namespace App\Controllers;

class Commercialization extends BaseController{

    public function index(){
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');

        $data['titulo'] = 'Comercializacion';
        return view('templates/header',$data).view('commercialization').view('templates/footer');
    }

}