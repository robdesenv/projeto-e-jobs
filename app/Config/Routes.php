<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/freelancer', 'FreelancerController::index');
$routes->get('/contratante', 'ContratanteController::index');


service('auth')->routes($routes);
