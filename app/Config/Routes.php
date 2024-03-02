<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'KaryakartaController::index');

//Presenter Routes for controllers
$routes->presenter('nagar', ['controller' => 'NagarController']);
$routes->presenter('basti', ['controller' => 'BastiController']);
//$routes->presenter('mohalla', ['controller' => 'MohallaController']);
//$routes->presenter('contact', ['controller' => 'ContactController']);
$routes->presenter('karyakarta', ['controller' => 'KaryakartaController']);
$routes->presenter('dayitva', ['controller' => 'DayitvaController']);

//attendees Rout
$routes->presenter('AttendeesController', ['only' => ['edit', 'new']]);
$routes->get('attendees/bybasti', 'AttendeesController::attendeesSearchByBasti');
$routes->post('attendees/bybasti', 'AttendeesController::attendeesListByBasti');
$routes->get('attendees/bynagar', 'AttendeesController::attendeesSearchByNagar'); //
$routes->post('attendees/bynagar', 'AttendeesController::attendeesListByNagar');
$routes->get('attendees/bydayitva', 'AttendeesController::attendeesSearchByDayitva'); //
$routes->post('attendees/bydayitva', 'AttendeesController::attendeesListByDayitva');
$routes->get('attendees/list', 'AttendeesController::index');




//Routes for login
$routes->get('login', 'LoginController::index');
$routes->post('login/authenticate', 'LoginController::authenticate');
$routes->get('logout', 'LoginController::logout');

//Routes for htmx
$routes->get('/getbastis', 'CommonController::getbasti');
$routes->get('/getmohallas', 'CommonController::getmohalla');
//$routes->get('/getToast', 'CommonController::getToast');
$routes->get('/getNagarBasti', 'CommonController::getNagarBasti');

//$routes->get('/dashboard', 'CommonController::dashboard');

//Routes for QR Code
$routes->post('qr/listbybasti', 'QRCodeController::listByBasti');
$routes->get('qr/printbybasti', 'QRCodeController::printByBasti');


// Route to index action
//$routes->get('/nagar', 'NagarController::index');

// Route to create action
//$routes->get('/nagar/create', 'NagarController::create');

// Route to show action
//$routes->get('/nagar/(:num)', 'NagarController::show/$1');

// Route to edit action
//$routes->get('/nagar/edit/(:num)', 'NagarController::edit/$1');

// Route to delete action
//$routes->get('/nagar/delete/(:num)', 'NagarController::delete/$1');
