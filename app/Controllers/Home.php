<?php

namespace App\Controllers;

use App\Models\Products_model;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');

        $data['titulo'] = 'UnnePhone';

        // Obtener los primeros 3 productos destacados
        $productsModel = new Products_model();
        $data['productos_destacados'] = $productsModel->findFeaturedProducts(3); // Suponiendo que tienes un método en el modelo para esto

        return view('templates/header', $data)
            . view('home', $data)
            . view('templates/footer');
    }
}
