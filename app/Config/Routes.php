<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/freelancer', 'FreelancerController::index', ['filter' => 'group:freelancer']);
$routes->get('/contratante', 'ContratanteController::index', ['filter' => 'group:contratante']);
$routes->get('/telainicial', 'telainicial::index');

service('auth')->routes($routes);
