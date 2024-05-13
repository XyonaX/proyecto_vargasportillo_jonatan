<?php

namespace App\Controllers;

class Contact extends BaseController{

    public function index(){
        $data['titulo'] = 'Contacto';
        return view('templates/header',$data).view('contact').view('templates/footer');
    }

    public function add_consulta(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            [
                'nombre' => 'required|max_length[150]',
                'email' => 'required|valid_email',
                'consultas' => 'required|min_length[10]|max_length[250]'
            ],
            [
                'nombre' => [
                    'required' => 'El nombre es requerido',
                    'max_length' => 'Ha superado el maximo de caracteres (150)'    
                ],
                'email' => [
                    'required' => 'El email es requerido',
                    'valid_email' => 'Tiene que ser un correo valido'
                ],
                'consultas' => [
                    'required' => 'La consulta es requerida',
                    'min_length' => 'La consulta debe tener minimo 10 caracteres',
                    'max_length' => 'La consulta tiene un maximo de 250 caracteres'
                ]
            ]
        );
        if ($validation->withRequest($request)->run()) {
            //Obtener los datos del formulario
            //insertar en la tabla mensajes
            return redirect()->route('contact')->with('message','Su consulta se envió exitosamente!');
        }else{

            $data['titulo'] = 'Contacto';
            $data['validation'] = $validation->getErrors();

            return view('templates/header',$data).view('contact').view('templates/footer');
    
        }
    }

}