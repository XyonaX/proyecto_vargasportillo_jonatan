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
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');

        $categoriaModel = new Category_model();
        $data['categorias'] = $categoriaModel->findAll();
        $data['titulo'] = 'Agregar Producto';

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $productsModel = new Products_model();

        // Define las reglas de validación
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
                'nombre' => [
                    'label' => 'Nombre del Producto',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'descripcion' => [
                    'label' => 'Descripción',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'precio' => [
                    'label' => 'Precio',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'numeric' => 'El campo {field} debe ser numérico.'
                    ]
                ],
                'cantidad' => [
                    'label' => 'Cantidad',
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'integer' => 'El campo {field} debe ser un número entero.'
                    ]
                ],
                'imagen' => [
                    'label' => 'Imagen',
                    'rules' => 'uploaded[imagen]|max_size[imagen,1024]|is_image[imagen]',
                    'errors' => [
                        'uploaded' => 'Debes subir una imagen.',
                        'max_size' => 'La imagen no debe exceder 1MB.',
                        'is_image' => 'El archivo subido debe ser una imagen válida.'
                    ]
                ]
            ]
        );

        // Ejecutar la validación
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

        // Si la validación falla, manejar los errores
        $data['validation'] = $validation->getErrors();

        // Obtener productos paginados para mostrar en la vista
        $productos_paginados = $this->show_products();
        $data['productos'] = $productos_paginados['productos'];
        $data['pager'] = $productos_paginados['pager'];

        // Mostrar la vista con los errores de validación y los productos existentes
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

        $perPage = 10; // número de productos por página

        $currentPage = $request->getVar('page') ?: 1;
        // Obtén todos los productos paginados
        $productos = $productsModel->paginate($perPage, 'default', $currentPage);

        // Inicializar $productos como un array vacío si está vacío
        if (!$productos) {
            $productos = [];
        }

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
        $session = session();
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $productsModel = new \App\Models\Products_model();

        $validation->setRules(
            [
                'categoria' => [
                    'label' => 'Categoría',
                    'rules' => 'required|not_in_list[0]',
                    'errors' => [
                        'required' => 'El campo es obligatorio.',
                        'not_in_list' => 'Debe seleccionar una opcion válida.'
                    ]
                ],
                'nombre' => [
                    'label' => 'Nombre del Producto',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo es obligatorio.'
                    ]
                ],
                'descripcion' => [
                    'label' => 'Descripción',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo es obligatorio.'
                    ]
                ],
                'precio' => [
                    'label' => 'Precio',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'El campo  es obligatorio.',
                        'numeric' => 'El campo debe ser numérico.'
                    ]
                ],
                'cantidad' => [
                    'label' => 'Cantidad',
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => 'El campo es obligatorio.',
                        'integer' => 'El campo debe ser un número entero.'
                    ]
                ],
                'imagen' => [
                    'label' => 'Imagen',
                    'rules' => 'if_exist|uploaded[imagen]|max_size[imagen,1024]|is_image[imagen]',
                    'errors' => [
                        'uploaded' => 'Debes subir una imagen.',
                        'max_size' => 'La imagen no debe exceder 1MB.',
                        'is_image' => 'El archivo subido debe ser una imagen.'
                    ]
                ]
            ]
        );

        $productId = $request->getPost('product_id');
        $data = [
            'id_categoria' => $request->getPost('categoria'),
            'nombre_producto' => $request->getPost('nombre'),
            'desc_producto' => $request->getPost('descripcion'),
            'precio_producto' => $request->getPost('precio'),
            'cantidad_producto' => $request->getPost('cantidad'),
            'activo' => $request->getPost('activo')
        ];


        if (!$validation->withRequest($request)->run()) {
            // Si la validación falla, redirigir con errores
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

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
