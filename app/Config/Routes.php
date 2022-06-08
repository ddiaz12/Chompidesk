<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// vista con el formulario
$routes->get('/', 'Home::index'); // Muestra formulario de login
$routes->post('/auth/login', 'AuthController::login'); // Aqui se recibe la informacion del formulario y se comprueba si existe el usuario y contraseña
$routes->get('/auth/logout', 'AuthController::logout'); // Cerrar sesion
$routes->get('/admin', 'Home::admin'); // Retorna la vista de administracion

// CRUD Chompidesk
// Piezas
$routes->get('/piezas', 'PiezaController::index');
$routes->get('/piezas/crear', 'PiezaController::crear');
$routes->post('/piezas/registrar', 'PiezaController::registrar');
// Clientes
$routes->get('/clientes', 'ClienteController::index');
$routes->get('/clientes/crear', 'ClienteController::crear');
$routes->post('/clientes/registrar', 'ClienteController::registrar');
// Servicio
$routes->get('/servicios', 'ServicioController::index');
$routes->get('/servicios/crear', 'ServicioController::crear');
$routes->post('/servicios/registrar', 'ServicioController::registrar');
// Empleados
$routes->get('/empleados', 'EmpleadoController::index');
$routes->get('/empleados/crear', 'EmpleadoController::crear');
$routes->post('/empleados/registrar', 'EmpleadoController::registrar');
// Ordenes
$routes->get('/ordenes', 'OrdenController::index');
$routes->get('/ordenes/crear', 'OrdenController::crear');
$routes->post('/ordenes/registrar', 'OrdenController::registrar');
$routes->get('/ordenes/detalles/(:num)', 'OrdenController::detalles/$1');
$routes->get('/ordenes/detalles/agregar/(:num)', 'OrdenController::agregar/$1');
$routes->post('/ordenes/agregarPieza/(:num)', 'OrdenController::agregarPieza/$1');
$routes->post('/ordenes/updateEstado/(:num)', 'OrdenController::updateEstado/$1');
// Reportes
$routes->get('/reportes', 'Home::reportes');
$routes->get('/reportes/ordenes-por-cliente', 'Home::ordenesPorCliente');
$routes->get('/reportes/ordenes-por-empleado', 'Home::ordenesPorEmpleado');
$routes->get('/reportes/ordenes-por-servicio', 'Home::ordenesPorServicio');
$routes->get('/reportes/ordenes-por-pieza', 'Home::ordenesPorPieza');
$routes->get('/reportes/ordenes-por-fecha', 'Home::ordenesPorFecha');


// Boton Edicion
$routes->get('/empleados/editar/(:num)', 'EmpleadoController::editar/$1');
$routes->post('/empleados/actualizar/(:num)', 'EmpleadoController::actualizar/$1');
$routes->get('/servicios/editar/(:num)', 'ServicioController::editar/$1');
$routes->post('/servicios/actualizar/(:num)', 'ServicioController::actualizar/$1');
$routes->get('/piezas/editar/(:num)', 'PiezaController::editar/$1');
$routes->post('/piezas/actualizar/(:num)', 'PiezaController::actualizar/$1');
$routes->get('/clientes/editar/(:num)', 'ClienteController::editar/$1');
$routes->post('/clientes/actualizar/(:num)', 'ClienteController::actualizar/$1');
// Boton Eliminar
$routes->get('/empleados/eliminar/(:num)', 'EmpleadoController::eliminar/$1');
$routes->get('/servicios/eliminar/(:num)', 'ServicioController::eliminar/$1');
$routes->get('/piezas/eliminar/(:num)', 'PiezaController::eliminar/$1');
$routes->get('/clientes/eliminar/(:num)', 'ClienteController::eliminar/$1');

// Trabajar las vistas mediante API's
//ruta para cargar vistas
$routes->get('(:any)', 'Home::view/$1');

//$routes->post('api/readEmpleados', 'ApiController::readEmpleados');
//$routes->post('api/ejemplo', 'ApiController::ejemplo');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
