<?php

namespace Config;

use App\Controllers\Administrasi;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Home
$routes->get('/', 'Home::index');

// API
$routes->match(["GET", "POST"], '/api/presensi', 'Api::presensi');
$routes->get("api/tes", "Api::tes");

// Administrasi
$routes->get("administrasi", "Administrasi::index");
$routes->post("administrasi/surat", "Administrasi::surat");
$routes->get("administrasi/tes", "Administrasi::tes");

// Asisten
$routes->get("asisten", "Asisten::index");
$routes->match(["GET", "POST"], "asisten/add-asisten", "Asisten::addAsisten");
$routes->get("asisten/(:segment)", "Asisten::detail/$1");

$routes->get(':segment', 'Home::maintenance');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
