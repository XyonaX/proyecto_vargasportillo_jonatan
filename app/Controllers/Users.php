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

    public function register_user(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();


        $validation->setRules(
            [
                'nombre' => 'required|max_length[150]',
                'apellido' => 'required|max_length[100]',
                'address' => 'required|min_length[10]|max_length[100]',
                'email' => 'required|valid_email',
                'password' => 'required|max_length[50]|min_length[8]',
                're-password' => 'required|max_length[50]|min_length[8]',
            ],
            [
                'nombre' => [
                    'required' => 'El nombre es requerido',
                    'max_length' => 'Has superado el maximo de caracteres (150)'    
                ],
                'apellido' => [
                    'required' => 'El apellido es requerido',
                    'max_length' => 'Has superado el maximo de caracteres (100)'  
                ],
                'adress' => [
                    'required' => 'La direccion de domicilio es requerida',
                    'min_length' => 'La direccion debe tener minimo (10) caracteres',
                    'max_length' => 'La consulta tiene un maximo de (100) caracteres'
                ],
                'email' => [
                    'required' => 'El email es requerido',
                    'valid_email' => 'Tiene que ser un correo valido'
                ],
                'password' => [
                    'required' => 'La contraseña es requerida',
                    'max_length' => 'Has superado el maximo de caracteres (50)',
                    'min_length' => 'La contraseña debe tener minimo 8 caracteres'
                ],
                're-password' => [
                    'required' => 'La contraseña es requerida',
                    'max_length' => 'Has superado el maximo de caracteres (50)',
                    'min_length' => 'La contraseña debe tener minimo 8 caracteres'
                ]
            ]
        );

        if($validation->withRequest($request)->run()){







            return redirect()->route('register')->with('message','Se ha registrado correctamente!');
        }

        $data['titulo'] = 'Registro';
        $data['validation'] = $validation->getErrors();

        return view('templates/header',$data).view('register').view('templates/footer');

    }

}