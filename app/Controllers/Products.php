<?php

namespace App\Controllers;

use App\Models\Category_model;
use App\Models\Products_model;

class Products extends BaseController
{
    public function index()
    {
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');

        $productos_paginados = $this->productsList();

        $data['productos'] = $productos_paginados['productos'];
        $data['pager'] = $productos_paginados['pager'];

        $data['titulo'] = 'Productos';

        return view('templates/header', $data) . view('products', $data) . view('templates/footer');
    }

    public function productsList()
    {
        $productsModel = new Products_model();
        $categoryModel = new Category_model();
        $pager = \Config\Services::pager();

        $perPage = 10; // Número de productos por página
        $productos = $productsModel->where('activo', 1)->paginate($perPage, 'default');
        $pager = $productsModel->pager;

        // Añade el nombre de la categoría a cada producto
        foreach ($productos as &$producto) {
            $categoria = $categoryModel->find($producto['id_categoria']);
            $producto['nombre_categoria'] = $categoria['nombre'];
        }
        return [
            'productos' => $productos,
            'pager' => $pager
        ];
    }
}
