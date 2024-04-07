<?php

namespace App\Controllers;

class Store extends BaseController{

    public function index(){
        echo view('templates/header');
        echo view('store');
        echo view('templates/footer');
    }

}