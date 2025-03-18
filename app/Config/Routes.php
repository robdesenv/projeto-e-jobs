<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//freelancer
$routes->get('/freelancer/index', 'FreelancerController::index', ['filter' => 'group:freelancer']);
$routes->get('/freelancer/meucurriculo', 'FreelancerController::meucurriculo', ['filter' => 'group:freelancer']);
$routes->get('/freelancer/servicosprestados', 'FreelancerController::servicosprestados', ['filter' => 'group:freelancer']);
$routes->get('/freelancer/telabusca', 'FreelancerController::telabusca', ['filter' => 'group:freelancer']);
$routes->get('/freelancer/transrecebidas', 'FreelancerController::transrecebidas', ['filter' => 'group:freelancer']);

//contratante
$routes->get('/contratante', 'ContratanteController::index', ['filter' => 'group:contratante']);


service('auth')->routes($routes);
