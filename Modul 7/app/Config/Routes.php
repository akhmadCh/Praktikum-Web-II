<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');

// halaman buku
$routes->get('/buku', 'Buku::index');
$routes->get('/buku/create', 'Buku::create');
$routes->post('/buku/save', 'Buku::save');
$routes->get('/buku/edit/(:segment)', 'Buku::edit/$1');
$routes->post('/buku/update/(:segment)', 'Buku::update/$1');
$routes->delete('/buku/(:num)', 'Buku::delete/$1');

// ketika user akses halaman buku yang tidak ada
$routes->get('/buku/(:any)', 'Buku::detail/$1');
// $routes->get('/buku/edit', 'Buku::edit');
// $routes->get('/buku/delete', 'Buku::delete');

$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/user', 'User::index', ['filter' => 'authGuard']);

$routes->get('/register', 'Auth::showRegister');
$routes->post('/auth/register', 'Auth::register');