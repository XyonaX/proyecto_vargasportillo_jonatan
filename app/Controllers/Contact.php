<?php

namespace App\Controllers;

class Contact extends BaseController{

    public function index(){
        $data['titulo'] = 'Contacto';
        return view('templates/header',$data).view('contact').view('templates/footer');
    }

}