<?php

namespace App\Controllers;

class About extends BaseController{

    public function index(){

        return view('templates/header').view('about').view('templates/footer');
    }

}