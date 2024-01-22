<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



// app/Config/BackendPages/auth.php
$routes->get('/logout', 'BackendPages\auth::logout');
$routes->get('/adminList', 'BackendPages\auth::adminList');
$routes->match(['get', 'post'], 'login', 'BackendPages\auth::login');



// Trong app/Config/home.php
$routes->get('/home', 'Home::viewHome');
$routes->get('/admin', 'Home::admin');
$routes->get('/', 'Home::viewDashboard');
$routes->get('/dashboard', 'Home::viewDashboard');
$routes->get('/productImport', 'Home::viewproductImport');
$routes->get('/productExport', 'Home::productExport');
$routes->get('/productManager', 'Home::productManager');
$routes->get('/store', 'Home::store');
$routes->get('/supplier', 'Home::supplier');



// Trong app/Config/Routes.php
$routes->get('/product', 'BackendPages\Product::product');
$routes->get('/productQuantity', 'Home::productQuantity');
$routes->get('/exportCSV', 'BackendPages\product::exportCSV');
$routes->post('/exportSelectedCSV', 'BackendPages\product::exportCSV');
$routes->get('/exportTemplate', 'BackendPages\product::downloadTemplate');
$routes->post('/upload', 'BackendPages\product::importCSVAndUpdate');
$routes->get('/get-imported-stock-data', 'BackendPages\product::getImportedStockData');
$routes->get('productDetails/(:num)', 'BackendPages\product::productDetails/$1');
$routes->post('/get-chart-data', 'BackendPages\product::getChartData');
// $routes->get('/productDetails', 'BackendPages\auth::productDetails');









$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/*Backend*/
// $routes->add('admin', 'backend/auth');
// $routes->get('/login', 'Home::index');
$route['auth/logout'] = '/backend/auth/logOut';
$route['phone'] = '/backend/phone';
$route['uids'] = '/backend/uids';
$route['posts'] = '/backend/posts';
$route['backend/socialitems'] = '/backend/socialItems';
$route['filters'] = '/backend/uids/filters';
$route['logout'] = '/backend/auth/logout';
// $route['login'] = '/Home/login';
// $routes->get('/test', 'Home::login');

