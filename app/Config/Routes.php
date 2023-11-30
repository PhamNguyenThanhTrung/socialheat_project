<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */




// app/Config/Routes.php
// app/Config/Routes.php
$routes->group('', ['filter' => 'auth'], function($routes)
{
    $routes->get('/', 'Home::viewDashboard');
    $routes->get('/dashboard', 'Home::viewDashboard');
    // Các route khác trong nhóm 'dashboard'
$routes->get('/adminList', 'BackendPages\auth::adminList');
$routes->get('/product', 'BackendPages\auth::product');
$routes->get('/productImport', 'Home::viewproductImport');
$routes->get('/productExport', 'Home::productExport');
$routes->get('/productManager', 'Home::productManager');
$routes->get('/store', 'Home::store');
$routes->get('/productQuantity', 'Home::productQuantity');
$routes->get('/supplier', 'Home::supplier');
// $routes->get('/productDetails', 'BackendPages\auth::productDetails');
// Trước
$routes->get('/exportCSV', 'BackendPages\auth::exportCSV');
$routes->post('/exportSelectedCSV', 'BackendPages\Auth::exportCSV');

$routes->get('/exportTemplate', 'BackendPages\auth::downloadTemplate');

$routes->post('/upload', 'BackendPages\Auth::importCSVAndUpdate');
$routes->get('/get-imported-stock-data', 'BackendPages\Auth::getImportedStockData');
// Trong app/Config/Routes.php
// Trong app/Config/Routes.php
$routes->get('productDetails/(:num)', 'BackendPages\auth::productDetails/$1');
$routes->post('/get-chart-data', 'BackendPages\auth::getChartData');


});


$routes->match(['get', 'post'], 'login', 'BackendPages\auth::login');
$routes->get('/logout', 'BackendPages\auth::logout');






$routes->get('/home', 'Home::viewHome');
$routes->get('/admin', 'Home::admin');
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

