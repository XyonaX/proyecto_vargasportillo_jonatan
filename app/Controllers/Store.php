<?php

namespace App\Controllers;

class Store extends BaseController{

    public function index(){
        $data['titulo'] = 'Comercializacion';
        return view('templates/header',$data).view('store').view('templates/footer');
    }

}