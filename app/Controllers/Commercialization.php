<?php

namespace App\Controllers;

class Commercialization extends BaseController{

    public function index(){
        $data['titulo'] = 'Comercializacion';
        return view('templates/header',$data).view('commercialization').view('templates/footer');
    }

}