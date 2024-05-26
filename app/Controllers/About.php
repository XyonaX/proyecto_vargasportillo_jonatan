<?php

namespace App\Controllers;

class About extends BaseController{

    public function index(){
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');

        $data['titulo'] = 'Sobre nosotros';
        return view('templates/header',$data).view('about').view('templates/footer');
    }

}