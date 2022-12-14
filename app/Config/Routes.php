<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/profile/(:num)', 'User::profile/$1');
$routes->get('/profile/edit/(:segment)', 'User::edit/$1');
$routes->post('/profile/edit/update/(:num)', 'User::update/$1');
$routes->get('/product', 'Home::product');
$routes->get('/product/detail/(:num)', 'Home::detail/$1');
$routes->post('/product/detail/save', 'Home::save');
$routes->get('/user', 'User::index');

/* Routes ADMIN */
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/manage-users/add', 'Admin::create', ['filter' => 'role:admin']);
$routes->get('/admin/manage-users', 'Admin::manageUsers', ['filter' => 'role:admin']);
$routes->post('/admin/manage-users/save', 'Admin::save', ['filter' => 'role:admin']);
$routes->get('/admin/manage-users/edit/(:segment)', 'Admin::edit/$1');
$routes->post('/admin/manage-users/edit/update/(:num)', 'Admin::update/$1');
$routes->delete('/admin/manage-users/(:num)', 'Admin::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);

// Manage Categories
$routes->get('/admin/categories', 'Categories::index', ['filter' => 'role:admin']);
$routes->get('/admin/categories/add', 'Categories::create', ['filter' => 'role:admin']);
$routes->post('/admin/categories/save', 'Categories::save', ['filter' => 'role:admin']);
$routes->delete('/admin/categories/(:num)', 'Categories::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/categories/edit/(:segment)', 'Categories::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/categories/update/(:num)', 'Categories::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/categories/detail/(:num)', 'Categories::detail/$1', ['filter' => 'role:admin']);
$routes->get('/admin/categories/add-capo', 'Categories::addCapo', ['filter' => 'role:admin']);
$routes->post('/admin/categories/capo/save', 'Categories::saveCapo', ['filter' => 'role:admin']);
$routes->get('/categories/product/(:num)', 'Categories::product/$1');

// Manage Product
$routes->get('/admin/product', 'Product::index', ['filter' => 'role:admin']);
$routes->get('/admin/product/add', 'Product::create', ['filter' => 'role:admin']);
$routes->post('/admin/product/save', 'Product::save', ['filter' => 'role:admin']);
$routes->delete('/admin/product/(:num)', 'Product::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/product/edit/(:segment)', 'Product::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/product/update/(:num)', 'Product::update/$1', ['filter' => 'role:admin']);

// Manage Order
$routes->get('/admin/order', 'Order::index', ['filter' => 'role:admin']);
$routes->delete('/admin/order/(:num)', 'Order::delete/$1', ['filter' => 'role:admin']);



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
