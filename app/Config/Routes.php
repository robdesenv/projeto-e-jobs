<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('teste', 'Home::teste');
$routes->post('teste', 'Home::teste');

//freelancer
$routes->get('/freelancer/index', 'FreelancerController::index', ['filter' => 'group:freelancer']);
$routes->get('/freelancer/meucurriculo', 'FreelancerController::meucurriculo', ['filter' => 'group:freelancer']);
$routes->post('/freelancer/meucurriculo', 'FreelancerController::meucurriculo', ['filter' => 'group:freelancer']);
$routes->get('/freelancer/excluircargo/(:num)', 'FreelancerController::excluirCargo/$1', ['filter' => 'group:freelancer']);
$routes->get('/freelancer/novocargo', 'FreelancerController::criarCargo', ['filter' => 'group:freelancer']);
$routes->get('/freelancer/editarcurriculo/(:num)', 'FreelancerController::editCurriculo/$1', ['filter' => 'group:freelancer']);
$routes->post('/freelancer/editarcurriculo/(:num)', 'FreelancerController::editCurriculo/$1', ['filter' => 'group:freelancer']);
$routes->get('/freelancer/servicosprestados', 'FreelancerController::servicosprestados', ['filter' => 'group:freelancer']);
$routes->get('/freelancer/telabusca', 'FreelancerController::telabusca', ['filter' => 'group:freelancer']);
//$routes->get('/freelancer/candidatarvaga/(:num)/(:num)', 'FreelancerController::candidatarvaga/$1/$2', ['filter' => 'group:freelancer'] );
$routes->get('/freelancer/candidatarvaga', 'FreelancerController::candidatarvaga', ['filter' => 'group:freelancer'] );
$routes->get('/freelancer/transrecebidas', 'FreelancerController::transrecebidas', ['filter' => 'group:freelancer']);

$routes->get('/freelancer/avaliacao', 'AvaliacaoContratanteController::avaliacaoContratante', ['filter' => 'group:freelancer']);
$routes->post('/freelancer/avaliacao', 'AvaliacaoContratanteController::avaliacaoContratante', ['filter' => 'group:freelancer']);

$routes->get('/freelancer/exibirInformacoesContratante', 'FreelancerController::exibirInformacoesContratante', ['filter' => 'group:freelancer']);

//contratante
$routes->get('/contratante', 'ContratanteController::index', ['filter' => 'group:contratante']);

$routes->get('/contratante/minhaempresa', 'ContratanteController::minhaempresa', ['filter' => 'group:contratante']);
$routes->post('/contratante/minhaempresa', 'ContratanteController::minhaempresa', ['filter' => 'group:contratante']);

$routes->get('/contratante/editarinformacoes/(:num)', 'ContratanteController::editInformacoes/$1', ['filter' => 'group:contratante']);
$routes->post('/contratante/editarinformacoes/(:num)', 'ContratanteController::editInformacoes/$1', ['filter' => 'group:contratante']);

$routes->get('/contratante/vagaspub', 'ContratanteController::vagaspub', ['filter' => 'group:contratante']);
$routes->post('/contratante/vagaspub', 'ContratanteController::vagaspub', ['filter' => 'group:contratante']);

$routes->get('/contratante/exibirInformacoesFreelancer', 'ContratanteController::exibirInformacoesFreelancer', ['filter' => 'group:contratante']);

$routes->get('/contratante/solicitacoes', 'ContratanteController::solicitacoes', ['filter' => 'group:contratante']);

$routes->get('/contratante/solicitacoes', 'ContratanteController::exibirSolicitacoes', ['filter' => 'group:contratante']);

$routes->get('/contratante/editarevento/(:num)', 'ContratanteController::editEvento/$1', ['filter' => 'group:contratante']);
$routes->post('/contratante/editarevento/(:num)', 'ContratanteController::editEvento/$1', ['filter' => 'group:contratante']);

$routes->get('/contratante/finalizarevento/(:num)', 'ContratanteController::finalizarEvento/$1', ['filter' => 'group:contratante']);

$routes->get('/contratante/excluirevento/(:num)', 'ContratanteController::deleteEventos/$1', ['filter' => 'group:contratante']);

$routes->get('/contratante/excluirvaga/(:num)', 'ContratanteController::deleteVagas/$1', ['filter' => 'group:contratante']);

$routes->get('/contratante/busca', 'ContratanteController::busca', ['filter' => 'group:contratante']);
$routes->post('/contratante/busca', 'ContratanteController::busca', ['filter' => 'group:contratante']);

$routes->get('/contratante/filtrarFreelancers', 'ContratanteController::filtrarFreelancers', ['filter' => 'group:contratante']);

$routes->get('/contratante/pagamentos', 'ContratanteController::pagamentos', ['filter' => 'group:contratante']);

$routes->get('contratante/avaliacao', 'AvaliacaoFreelancerController::avaliacaoFreelancer', ['filter' => 'group:contratante'] );
$routes->post('contratante/avaliacao', 'AvaliacaoFreelancerController::avaliacaoFreelancer', ['filter' => 'group:contratante'] );

service('auth')->routes($routes);
