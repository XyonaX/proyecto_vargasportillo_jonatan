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

        $categoriaModel = new Category_model();
        $data['categorias'] = $categoriaModel->findAll();

        $productos_paginados = new GestionProductos();
        $resultado = $productos_paginados->show_products();

        $data['productos'] = $resultado['productos'];
        $data['pager'] = $resultado['pager'];

        $data['titulo'] = 'Productos';

        return view('templates/header', $data) . view('products', $data) . view('templates/footer');
    }


    public function productsList()
    {
        $productsModel = new \App\Models\Products_model();
        $categoryModel = new \App\Models\Category_model();
        $pager = \Config\Services::pager();
        $request = \Config\Services::request();

        $perPage = 10; // numero de productos por pagina

        $currentPage = $request->getVar('page') ?: 1;
        // Obtén todos los productos paginados
        $productos = $productsModel->paginate($perPage, 'default', $currentPage);

        $pager = $productsModel->pager;
        $pager->setPath('proyecto_vargasportillo_jonatan/gestionProductos');

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
