<?php

namespace App\Controllers;

class About extends BaseController{

    public function index(){
        $data['titulo'] = 'Sobre nosotros';
        return view('templates/header',$data).view('about').view('templates/footer');
    }

}