<?php

namespace App\Controllers;

class Users extends BaseController{

    public function login(){
        $data['titulo'] = 'Login';
        return view('templates/header',$data).view('login').view('templates/footer');
    }
    

    public function register()
    {
        $data['titulo'] = 'Registro';
        return view('templates/header',$data).view('register').view('templates/footer');
    }

}