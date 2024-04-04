<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // return view('principal.html');
        return view('plantilla');
    }

    public function products(){
        return view('products');
    }
}
