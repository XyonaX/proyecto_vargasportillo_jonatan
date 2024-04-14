<?php

namespace App\Controllers;

class Contact extends BaseController{

    public function index(){

        return view('templates/header').view('contact').view('templates/footer');
    }

}