<?php

namespace App\Controllers;

class Terms extends BaseController{

    public function index(){
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');

        $data['titulo'] = 'Terminos & Usos';
        return view('templates/header',$data).view('terms').view('templates/footer');
    }

}