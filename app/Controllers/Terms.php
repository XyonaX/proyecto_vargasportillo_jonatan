<?php

namespace App\Controllers;

class Terms extends BaseController{

    public function index(){
        $data['titulo'] = 'Terminos & Usos';
        return view('templates/header',$data).view('terms').view('templates/footer');
    }

}