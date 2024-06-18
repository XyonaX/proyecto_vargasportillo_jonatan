<?php

namespace App\Controllers;

use App\Models\Users_model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
                'usuario_estado' => 1,
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
                    'usuario_estado' => $usuarioEncontrado['usuario_estado'],
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

    public function listar_usuarios()
    {   
        $userModel = new Users_model();
        $pager = \Config\Services::pager();
        $request = \Config\Services::request();
    
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');
    
        $perPage = 5; // Número de usuarios por página
        $currentPage = $request->getVar('page') ?: 1;
    
        $usuarios = $userModel->paginate($perPage, 'default', $currentPage);
        $pager = $userModel->pager;
        $pager->setPath('listar_usuarios'); // Ruta personalizada
    
        $data['titulo'] = 'Listado de Usuarios';
        $data['usuarios'] = $usuarios;
        $data['pager'] = $pager;
    
        return view('templates/header', $data)
            . view('listar_usuarios', $data)
            . view('templates/footer');
    }
    


    public function toggle_estado($usuarioId)
    {
        $userModel = new Users_model();
        $usuario = $userModel->find($usuarioId);

        if ($usuario) {
            $nuevoEstado = $usuario['usuario_estado'] == 1 ? 0 : 1;
            $userModel->update($usuarioId, ['usuario_estado' => $nuevoEstado]);
            return redirect()->to('/ver_usuarios')->with('message', 'Estado del usuario actualizado correctamente');
        } else {
            return redirect()->to('/ver_usuarios')->with('err', 'Usuario no encontrado');
        }
    }

    public function forgot_password()
    {
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
            $userModel = new Users_model();
            $email = $request->getPost('email');
            $usuarioEncontrado = $userModel->where('usuario_email', $email)->first();

            if ($usuarioEncontrado) {
                $session = session();
                $token = bin2hex(random_bytes(32));
                $session->setTempdata('reset_token', $token, 600); // Guardar el token en sesión por 10 minutos
                $session->setTempdata('reset_email', $email, 600); // Guardar el email en sesión por 10 minutos

                if ($this->enviarCorreoRecuperacion($usuarioEncontrado['usuario_email'], $token)) {
                    return redirect()->to('/login')->with('message', 'Se ha enviado un correo electrónico con instrucciones para recuperar tu contraseña.');
                } else {
                    return redirect()->to('/login')->with('err', 'No se pudo enviar el correo electrónico. Por favor, intenta nuevamente más tarde.');
                }
            } else {
                return redirect()->to('/login')->with('err', 'No se encontró ningún usuario con este correo electrónico.');
            }
        }

        $data['titulo'] = 'Recuperar Contraseña';
        $data['validation'] = $validation;

        return view('templates/header', $data)
            . view('forgot_password', $data)
            . view('templates/footer');
    }


    private function enviarCorreoRecuperacion($email, $token)
    {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'live.smtp.mailtrap.io';  // Cambiar al host de tu servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'api';  // Cambiar al correo desde el cual enviarás el correo
            $mail->Password = '7b51bb608c7aa32ebeeecb762a17445d';  // Cambiar a la contraseña de tu correo
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom('mailtrap@demomailtrap.com', 'UNNEPHONES');  // Cambiar al correo y nombre del remitente
            $mail->addAddress('zaxttpro@gmail.com');  // Agregar el destinatario

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Recuperacion de Contrasena';
            $mail->Body    = 'Para restablecer tu contrasena, haz clic en este enlace: <a href="' . base_url() . 'reset_password/' . $token . '">Recuperar Contrasena</a>';

            $mail->send();
            return true;
        } catch (Exception $e) {
            // Manejo de errores
            // echo 'El mensaje no pudo ser enviado. Error: ', $mail->ErrorInfo;
            return false;
        }
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
        $data['reset_token'] = $token; // Pasar el token a la vista

        return view('templates/header', $data)
            . view('reset_password', $data)
            . view('templates/footer');
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
            $resetToken = $request->getPost('reset_token');
            $session = session();
            $storedToken = $session->getTempdata('reset_token');
            $email = $session->getTempdata('reset_email');

            if (!$storedToken || $resetToken !== $storedToken || !$email) {
                return redirect()->to('/login')->with('err', 'El token para restablecer la contraseña es inválido o ha expirado.');
            }

            $usuario = $userModel->where('usuario_email', $email)->first();
            if (!$usuario) {
                return redirect()->to('/login')->with('err', 'No se encontró ningún usuario con este correo electrónico.');
            }

            $newPasswordHash = password_hash($request->getPost('new_password'), PASSWORD_DEFAULT);
            $userModel->update($usuario['usuario_id'], ['usuario_password' => $newPasswordHash]);

            $session->removeTempdata('reset_token');
            $session->removeTempdata('reset_email');

            return redirect()->to('/login')->with('message', 'Contraseña restablecida correctamente. Por favor, inicia sesión con tu nueva contraseña.');
        }

        $data['titulo'] = 'Restablecer Contraseña';
        $data['validation'] = $validation->getErrors();

        return view('reset_password', $data);
    }
}
