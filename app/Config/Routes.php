<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/commercialization', 'Commercialization::index');
$routes->get('/about', 'About::index');
$routes->get('/contact', 'Contact::index');
$routes->get('/products', 'Products::index');
$routes->get('/products/(:segment)', 'Products::index'); 
$routes->get('/terms', 'Terms::index');
$routes->get('/login', 'Users::login');
$routes->get('/register', 'Users::register');
$routes->get('/logout', 'Users::logout_user');
$routes->get('/carrito', 'Carrito::index');
$routes->get('/consultas', 'Consultas::index',['filter' => 'admin']);
$routes->get('/gestionProductos', 'GestionProductos::index', ['filter' => 'admin']);
$routes->get('/gestionProductos/activar_desactivar/(:num)', 'GestionProductos::activar_desactivar/$1', ['filter' => 'admin']);
$routes->get('/remove_item/(:any)', 'Carrito::eliminar_item/$1');
$routes->get('/delete_cart', 'Carrito::eliminar_carrito');
$routes->get('/ventas', 'Carrito::guardar_venta');
$routes->get('/ver_ventas', 'Ventas::index',['filter' => 'admin']);
$routes->get('/ver_detalle/(:num)', 'Ventas::listar_detalle_venta/$1',['filter' => 'admin']);

$routes->post('/contact', 'Contact::add_consulta');
$routes->post('/register', 'Users::register_user');
$routes->post('/login', 'Users::login_user');
$routes->post('/gestionProductos', 'GestionProductos::add_producto', ['filter' => 'admin']);
$routes->post('/gestionProductos/edit_product', 'GestionProductos::edit_product', ['filter' => 'admin']);
$routes->post('/consultas/toggle_visto/(:num)', 'Consultas::toggle_visto/$1',['filter' => 'admin']);
$routes->post('/add_carrito', 'Carrito::agregar_carrito');





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
