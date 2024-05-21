<?php

namespace App\Controllers;

use App\Models\Users_model;
use Tests\Support\Models\UserModel;

class Users extends BaseController
{

    public function login()
    {
        $data['titulo'] = 'Login';
        return view('templates/header', $data)
            . view('login')
            . view('templates/footer');
    }

    public function register()
    {
        $data['titulo'] = 'Registro';
        return view('templates/header', $data)
            . view('register')
            . view('templates/footer');
    }

    public function register_user()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $userModel = new Users_model();

        $validation->setRules(
            [
                'nombre' => 'required|max_length[150]',
                'apellido' => 'required|max_length[100]',
                'direccion' => 'required|min_length[10]|max_length[100]',
                'email' => 'required|valid_email|is_unique[usuarios.usuario_email]',
                'password' => 'required|max_length[50]|min_length[8]',
                're-password' => 'required|matches[password]|max_length[50]|min_length[8]',
            ],
            [
                'nombre' => [
                    'required' => 'El nombre es requerido',
                    'max_length' => 'Has superado el maximo de caracteres (150)',
                ],
                'apellido' => [
                    'required' => 'El apellido es requerido',
                    'max_length' => 'Has superado el maximo de caracteres (100)',
                ],
                'direccion' => [
                    'required' => 'La direccion de domicilio es requerida',
                    'min_length' => 'La direccion debe tener minimo (10) caracteres',
                    'max_length' => 'La direccion tiene un maximo de (100) caracteres',
                ],
                'email' => [
                    'required' => 'El email es requerido',
                    'valid_email' => 'Tiene que ser un correo valido',
                    'is_unique' => 'El correo electrónico ya está registrado',
                ],
                'password' => [
                    'required' => 'La contraseña es requerida',
                    'max_length' => 'Has superado el maximo de caracteres (50)',
                    'min_length' => 'La contraseña debe tener minimo 8 caracteres',
                ],
                're-password' => [
                    'required' => 'La contraseña es requerida',
                    'max_length' => 'Has superado el maximo de caracteres (50)',
                    'min_length' => 'La contraseña debe tener minimo 8 caracteres',
                    'matches' => 'Las contraseñas no coinciden',
                ],
            ]
        );

        if ($validation->withRequest($request)->run()) {
            $data = [
                'rol_id' => 2,
                'usuario_nombre' => $request->getPost('nombre'),
                'usuario_apellido' => $request->getPost('apellido'),
                'usuario_direccion' => $request->getPost('direccion'),
                'usuario_email' => $request->getPost('email'),
                'usuario_password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
            ];

            $userModel->insert($data);

            return redirect()->route('register')->with('message', 'Se ha registrado correctamente!');
        }

        $data['titulo'] = 'Registro';
        $data['validation'] = $validation->getErrors();

        return view('templates/header', $data)
            . view('register', $data)
            . view('templates/footer');
    }

    public function login_user()
    {
        $request = \Config\Services::request();
        $userModel = new Users_model();


        $email = $request->getPost('email');
        $pass = $request->getPost('password');


        $usuarioEncontrado = $userModel->where('usuario_email', $email)->first();

        if ($usuarioEncontrado && password_verify($pass, $usuarioEncontrado['usuario_password'])) {
            $session = session();

            $session->set(
                [
                    'usuario_id' => $usuarioEncontrado['usuario_id'],
                    'usuario_nombre' => $usuarioEncontrado['usuario_nombre'],
                    'usuario_apellido' => $usuarioEncontrado['usuario_apellido'],
                    'usuario_email' => $usuarioEncontrado['usuario_email'],
                    'isLoggedIn' => true,
                ]
            );
            return redirect()->to('/login')->with('message', 'Login exitoso!');
        }else{
            return redirect()->to('/login')->with('err', 'Correo electrónico o contraseña incorrectos.');
        }
    }
}
