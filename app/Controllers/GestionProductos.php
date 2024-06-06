<?php

namespace App\Controllers;

use App\Models\Category_model;
use App\Models\Products_model;


class GestionProductos extends BaseController
{
    public function index()
    {
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');

        $categoriaModel = new Category_model();
        $data['categorias'] = $categoriaModel->findAll();
        $data['validation'] = session()->getFlashdata('validation');
        $data['form_open'] = session()->getFlashdata('form_open');

        $productos_paginados = $this->show_products();

        $data['productos'] = $productos_paginados['productos'];
        $data['pager'] = $productos_paginados['pager'];



        $data['titulo'] = 'Gestion Productos';
        return view('templates/header', $data)
            . view('gestionProductos', $data)
            . view('templates/footer');
    }

    public function add_producto()
    {
        $categoriaModel = new Category_model();
        $data['categorias'] = $categoriaModel->findAll();
        $data['titulo'] = 'Agregar Producto';

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $productsModel = new Products_model();

        $validation->setRules(
            [
                'categoria' => [
                    'label' => 'Categoría',
                    'rules' => 'required|not_in_list[0]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'not_in_list' => 'Debe seleccionar una {field} válida.'
                    ]
                ],
                'nombre' => 'required',
                'descripcion' => 'required',
                'precio' => 'required|numeric',
                'cantidad' => 'required|integer',
                'imagen' => 'uploaded[imagen]|max_size[imagen,1024]|is_image[imagen]'
            ],
            [
                'imagen' => [
                    'uploaded' => 'Debes subir una imagen'
                ]
            ]
        );

        if ($validation->withRequest($request)->run()) {
            $img = $request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            if ($img->isValid() && !$img->hasMoved()) {
                $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);

                $data = [
                    'id_categoria' => $request->getPost('categoria'),
                    'nombre_producto' => $request->getPost('nombre'),
                    'desc_producto' => $request->getPost('descripcion'),
                    'precio_producto' => $request->getPost('precio'),
                    'cantidad_producto' => $request->getPost('cantidad'),
                    'nombre_imagen' => $nombre_aleatorio,
                    'activo' => 1 // Puedes ajustar esto según tus necesidades
                ];
                $productsModel->insert($data);

                return redirect()->to('/gestionProductos')->with('success', 'Producto agregado correctamente');
            }
        }

        $data['validation'] = $validation->getErrors();

        return view('templates/header', $data)
            . view('gestionProductos', $data)
            . view('templates/footer');
    }


    public function show_products()
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

    public function edit_product()
    {
        $request = \Config\Services::request();
        $productsModel = new \App\Models\Products_model();

        $productId = $request->getPost('product_id');
        $data = [
            'id_categoria' => $request->getPost('categoria'),
            'nombre_producto' => $request->getPost('nombre'),
            'desc_producto' => $request->getPost('descripcion'),
            'precio_producto' => $request->getPost('precio'),
            'cantidad_producto' => $request->getPost('cantidad'),
            'activo' => $request->getPost('activo')
        ];

        if ($request->getFile('imagen')->isValid()) {
            $img = $request->getFile('imagen');
            $nombreAleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'assets/uploads', $nombreAleatorio);
            $data['nombre_imagen'] = $nombreAleatorio;
        }
        $productsModel->update($productId, $data);

        return redirect()->to('/gestionProductos')->with('success', 'Producto actualizado correctamente');
    }

    public function activar_desactivar($productId)
{
    $productsModel = new \App\Models\Products_model();
    $product = $productsModel->find($productId);

    if ($product) {
        $newStatus = $product['activo'] ? 0 : 1;
        $productsModel->update($productId, ['activo' => $newStatus]);
        return redirect()->to('/gestionProductos')->with('success', 'Producto actualizado correctamente');
    } else {
        return redirect()->to('/gestionProductos')->with('error', 'Producto no encontrado');
    }
}

    
}
