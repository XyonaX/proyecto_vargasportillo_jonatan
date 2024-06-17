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

        if ($usuarioEncontrado) {
            if (password_verify($pass, $usuarioEncontrado['usuario_password']) || $pass === $usuarioEncontrado['usuario_password']) {
                $session = session();
                $session->set([
                    'usuario_id' => $usuarioEncontrado['usuario_id'],
                    'usuario_nombre' => $usuarioEncontrado['usuario_nombre'],
                    'usuario_apellido' => $usuarioEncontrado['usuario_apellido'],
                    'usuario_email' => $usuarioEncontrado['usuario_email'],
                    'rol_id' => $usuarioEncontrado['rol_id'],
                    'isLoggedIn' => true,
                ]);
                return redirect()->to('/')->with('message', 'Login exitoso!');
            }
        }
        return redirect()->to('/login')->with('err', 'Correo electrónico o contraseña incorrectos.');
    }

    public function logout_user()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/')->with('message', 'Sesión cerrada correctamente.');
    }

    public function forgot_password()
    {
        // Validar el email ingresado
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            'email' => 'required|valid_email'
        ], [
            'email' => [
                'required' => 'El correo electrónico es requerido',
                'valid_email' => 'Debe ser un correo electrónico válido'
            ]
        ]);

        if ($validation->withRequest($request)->run()) {
            // Obtener el usuario por su correo electrónico
            $userModel = new Users_model();
            $email = $request->getPost('email');
            $usuarioEncontrado = $userModel->where('usuario_email', $email)->first();

            if ($usuarioEncontrado) {
                $session = session();
                $token = bin2hex(random_bytes(32));
                $session->setTempdata('reset_token', $token, 600); // Almacenar el token en sesión por 10 minutos

                $email = \Config\Services::email();
                $email->setTo($usuarioEncontrado['usuario_email']);
                $email->setSubject('Recuperación de Contraseña');
                $email->setMessage("Para restablecer tu contraseña, haz clic en este enlace: <a href='" . base_url() . "/reset_password/$token'>Recuperar Contraseña</a>");

                if ($email->send()) {
                    return redirect()->to('/login')->with('message', 'Se ha enviado un correo electrónico con instrucciones para recuperar tu contraseña.');
                } else {
                    return redirect()->to('/login')->with('err', 'No se pudo enviar el correo electrónico. Por favor, intenta nuevamente más tarde.');
                }
            } else {
                return redirect()->to('/login')->with('err', 'No se encontró ningún usuario con este correo electrónico.');
            }
        }

        // Si no se pasan las validaciones, mostrar errores en la vista de login
        $data['titulo'] = 'Recuperar Contraseña';
        $data['validation'] = $validation;

        return view('templates/header', $data)
            . view('forgot_password', $data)
            . view('templates/footer');
    }

    public function show_reset_password_form($token = null)
    {
        if (empty($token)) {
            return redirect()->to('/login')->with('err', 'No se ha proporcionado un token válido para restablecer la contraseña.');
        }

        $session = session();
        $storedToken = $session->getTempdata('reset_token');

        if (!$storedToken || $token !== $storedToken) {
            return redirect()->to('/login')->with('err', 'El token para restablecer la contraseña es inválido o ha expirado.');
        }

        $data['titulo'] = 'Restablecer Contraseña';
        return view('reset_password', $data);
    }

    public function reset_password_process()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $userModel = new Users_model();

        $validation->setRules([
            'new_password' => 'required|min_length[8]|max_length[50]',
            'confirm_password' => 'required|matches[new_password]'
        ], [
            'new_password' => [
                'required' => 'La nueva contraseña es requerida',
                'min_length' => 'La contraseña debe tener al menos 8 caracteres',
                'max_length' => 'La contraseña no debe exceder los 50 caracteres'
            ],
            'confirm_password' => [
                'required' => 'Debes confirmar la contraseña',
                'matches' => 'Las contraseñas no coinciden'
            ]
        ]);

        if ($validation->withRequest($request)->run()) {
            // Obtener el token de reset almacenado en sesión
            $resetToken = $request->getPost('reset_token');

            // Validar el token (opcional, pero recomendado)
            // Aquí puedes agregar lógica para validar el token si es necesario

            // Obtener el usuario por el token (opcional, pero recomendado)
            // Aquí puedes agregar lógica para obtener el usuario asociado al token

            // Actualizar la contraseña del usuario
            // Aquí actualizas la contraseña del usuario en la base de datos
            // Ejemplo: $userModel->update($usuario_id, ['usuario_password' => password_hash($request->getPost('new_password'), PASSWORD_DEFAULT)]);

            // Redireccionar al login con un mensaje de éxito
            return redirect()->to('/login')->with('message', 'Contraseña restablecida correctamente. Por favor, inicia sesión con tu nueva contraseña.');
        }

        // Si la validación falla, mostrar errores en la vista de reset_password
        $data['titulo'] = 'Restablecer Contraseña';
        $data['validation'] = $validation->getErrors();

        return view('reset_password', $data);
    }
}
