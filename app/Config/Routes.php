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
$routes->get('/about', 'About::index');
$routes->get('/contact', 'Contact::index');
$routes->get('/products', 'Products::index');
$routes->get('/terms', 'Terms::index');

$routes->group('', ['filter' => 'admin'], function ($routes) {
    // Rutas administrativas que requieren autenticación de administrador
    $routes->get('/consultas', 'Consultas::index');
    $routes->get('/gestionProductos', 'GestionProductos::index');
    $routes->get('/gestionProductos/activar_desactivar/(:num)', 'GestionProductos::activar_desactivar/$1');
    $routes->get('/ver_usuarios', 'Users::listar_usuarios');
    $routes->post('/usuarios/toggle_estado/(:num)', 'Users::toggle_estado/$1');
    $routes->post('/consultas/toggle_visto/(:num)', 'Consultas::toggle_visto/$1');
    $routes->post('/gestionProductos', 'GestionProductos::add_producto');
    $routes->post('/gestionProductos/edit_product', 'GestionProductos::edit_product');
});

// Rutas de autenticación y usuario
$routes->get('/login', 'Users::login');
$routes->get('/register', 'Users::register');
$routes->post('/register', 'Users::register_user');
$routes->post('/login', 'Users::login_user');
$routes->get('/logout', 'Users::logout_user');
$routes->get('/scriptMailer', 'Users::index');

// Rutas para el carrito de compras
$routes->get('/carrito', 'Carrito::index');
$routes->post('/add_carrito', 'Carrito::agregar_carrito');
$routes->get('/remove_item/(:any)', 'Carrito::eliminar_item/$1');
$routes->get('/delete_cart', 'Carrito::eliminar_carrito');
$routes->get('/ventas', 'Carrito::guardar_venta');

// Rutas específicas para la recuperación de contraseña
$routes->get('/forgot_password', 'Users::forgot_password'); // Vista para ingresar el correo
$routes->post('/forgot_password', 'Users::forgot_password'); // Procesar envío de instrucciones de recuperación
$routes->get('/reset_password/(:any)', 'Users::show_reset_password_form/$1'); // Formulario para restablecer la contraseña
$routes->post('/reset_password_process', 'Users::reset_password_process'); // Procesar restablecimiento de contraseña




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
