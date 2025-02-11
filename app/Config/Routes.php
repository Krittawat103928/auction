<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/fecth_data', 'Home::fecth_data');
$routes->get('/insertAuction', 'Home::insertAuction');

$routes->get('/uploaddata', 'Auction::uploaddata');




$routes->post('/loadajax', 'Home::load_ajax');



// ทดสอบบันทึกข้อมูล

$routes->get('/insert_data', 'Auction::insert_data');



$routes->post('upload', 'FileUploadController::upload');
