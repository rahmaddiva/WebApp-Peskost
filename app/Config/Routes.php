<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::landingpage');
$routes->get('/login', 'Home::login');
$routes->get('/registrasi', 'Home::registrasi');
$routes->post('/registrasi/proses_registrasi', 'Home::proses_registrasi');
$routes->post('/login/proses_login', 'Home::proses_login');
$routes->get('/forgot_password', 'Home::forgot_password');
$routes->post('/proses_forgot_password', 'Home::proses_forgot_password');
$routes->get('/reset-password(:any)', 'Home::reset_password');
$routes->post('/proses_reset_password', 'Home::proses_reset_password');
$routes->get('/logout', 'Home::logout');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('kost/detail/(:num)', 'Home::detail/$1');


// routes untuk kost
$routes->get('/kost', 'KostController::index');
$routes->get('/kost/tambah', 'KostController::tambah');
$routes->post('/kost/simpan_kost', 'KostController::simpan_kost');
$routes->get('/kost/detail_kost/(:num)', 'KostController::detail/$1');
$routes->get('/kost/edit/(:num)', 'KostController::edit/$1');
$routes->post('/kost/update_kost/', 'KostController::update_kost/$1');
$routes->get('/kost/hapus/(:num)', 'KostController::hapus_kost/$1');

// routes untuk pemesanan
$routes->get('/pemesanan', 'PemesananController::index');

