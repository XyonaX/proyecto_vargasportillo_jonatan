<?php

namespace App\Controllers;

class Store extends BaseController{

    public function index(){

        return view('templates/header').view('store').view('templates/footer');
    }

}