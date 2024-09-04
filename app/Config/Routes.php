<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/admin', 'Home::dashboard');

$routes->get('/login', 'Home::login');

$routes->get('/daftar', 'Home::login');
