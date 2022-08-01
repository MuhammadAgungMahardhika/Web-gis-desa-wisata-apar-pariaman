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
$routes->setDefaultController('Pages');
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

$routes->get('/', 'Pages::index');
$routes->get('/index', 'Pages::index');
$routes->get('/landing_page', 'Pages::landing_page');
$routes->get('/about', 'Pages::about');
$routes->get('/admin', 'Admin::users', ['filter' => 'role:admin']);

// Routes untuk authentikasi
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');

// Route user menu
// Route untuk manage user profile
$routes->group('user', function ($routes) {
    $routes->get('index', 'User::index', ['filter' => 'role:user,admin']);
    $routes->get('save_update/(:segment)', 'User::save_update/$1', ['filter' => 'role:user,admin']);
});

// Menu list Object
$routes->group('list_object', function ($routes) {
    $routes->get('index', 'ListObjectController::index');
    $routes->get('/', 'ListObjectController::index');
    $routes->get('atraction', 'ListObjectController::atraction');
    $routes->get('atraction/(:segment)', 'ListObjectController::atraction/$1');
    $routes->get('atraction_by_name/(:segment)', 'ListObjectController::atraction_by_name/$1');


    $routes->get('event', 'ListObjectController::event');
    $routes->get('event/(:segment)', 'ListObjectController::event/$1');
    $routes->get('event_by_name/(:segment)', 'ListObjectController::event_by_name/$1');

    $routes->get('souvenir_place', 'ListObjectController::souvenir_place');
    $routes->get('souvenir_place/(:segment)', 'ListObjectController::souvenir_place/$1');

    $routes->get('culinary_place', 'ListObjectController::culinary_place');
    $routes->get('culinary_place/(:segment)', 'ListObjectController::culinary_place/$1');

    $routes->get('worship_place', 'ListObjectController::worship_place');
    $routes->get('worship_place/(:segment)', 'ListObjectController::worship_place/$1');

    $routes->get('facility', 'ListObjectController::facility');
    $routes->get('facility/(:segment)', 'ListObjectController::facility/$1');

    $routes->get('detail_object/(:segment)', 'ListObjectController::detail_object/$1');

    $routes->get('search_main_nearby/(:segment)', 'ListObjectController::search_main_nearby/$1');
    $routes->get('search_support_nearby/(:segment)', 'ListObjectController::search_support_nearby/$1');
});


// Menu detail object
$routes->group('detail_object', function ($routes) {
    $routes->get('atraction/(:segment)', 'DetailObjectController::atraction/$1');
    $routes->get('event/(:segment)', 'DetailObjectController::event/$1');

    $routes->get('souvenir_place/(:segment)', 'DetailObjectController::souvenir_place/$1');

    $routes->get('culinary_place/(:segment)', 'DetailObjectController::culinary_place/$1');

    $routes->get('worship_place/(:segment)', 'DetailObjectController::worship_place/$1');

    $routes->get('facility/(:segment)', 'DetailObjectController::facility/$1');
});

// Menu detail object
$routes->group('review_atraction', function ($routes) {
    $routes->post('atraction', 'ReviewController::atraction');
});


// Route Admin menu
//  1. Route Users
$routes->group('manage_users', function ($routes) {
    $routes->get('/', 'ManageUsersController::index', ['filter' => 'role:admin']);
    $routes->get('index', 'ManageUsersController::index', ['filter' => 'role:admin']);
    $routes->get('detail/(:num)', 'ManageUsersController::detail/$1',  ['filter' => 'role:admin']);
    $routes->get('edit/(:num)', 'ManageUsersController::edit/$1',  ['filter' => 'role:admin']);
    $routes->post('save_update/(:segment)', 'ManageUsersController::save_update/$1', ['filter' => 'role:user,admin']);
    $routes->get('insert', 'ManageUsersController::insert', ['filter' => 'role:admin']);
    $routes->post('save_insert', 'ManageUsersController::save_insert', ['filter' => 'role:admin']);
    $routes->get('delete/(:segment)', 'ManageUsersController::delete/$1', ['filter' => 'role:admin']);
});


//  2. Route manage atraction

$routes->group('manage_atraction', function ($routes) {
    $routes->get('/', 'ManageAtractionController::index', ['filter' => 'role:admin']);
    $routes->get('index', 'ManageAtractionController::index', ['filter' => 'role:admin']);
    $routes->get('detail/(:segment)', 'ManageAtractionController::detail/$1', ['filter' => 'role:admin']);
    $routes->get('edit/(:segment)', 'ManageAtractionController::edit/$1', ['filter' => 'role:admin']);
    $routes->post('save_update/(:segment)', 'ManageAtractionController::save_update/$1', ['filter' => 'role:admin']);
    $routes->get('insert', 'ManageAtractionController::insert', ['filter' => 'role:admin']);
    $routes->post('save_insert', 'ManageAtractionController::save_insert', ['filter' => 'role:admin']);
    $routes->get('delete/(:segment)', 'ManageAtractionController::delete/$1', ['filter' => 'role:admin']);
});


//  3. Route manage apar
$routes->group('manage_apar', function ($routes) {
    $routes->get('/', 'ManageAparController::index', ['filter' => 'role:admin']);
    $routes->get('index', 'ManageAparController::index', ['filter' => 'role:admin']);
    $routes->get('edit/(:segment)', 'ManageAparController::edit/$1', ['filter' => 'role:admin']);
    $routes->post('save_update/(:segment)', 'ManageAparController::save_update/$1', ['filter' => 'role:admin']);
    $routes->get('insert', 'ManageAparController::insert', ['filter' => 'role:admin']);
    $routes->post('save_insert', 'ManageAparController::save_insert', ['filter' => 'role:admin']);
});



// 4. Route manage event
$routes->group('manage_event', function ($routes) {
    $routes->get('/', 'ManageEventController::index', ['filter' => 'role:admin']);
    $routes->get('index', 'ManageEventController::index', ['filter' => 'role:admin']);
    $routes->get('detail/(:segment)', 'ManageEventController::detail/$1', ['filter' => 'role:admin']);
    $routes->get('edit/(:segment)', 'ManageEventController::edit/$1', ['filter' => 'role:admin']);
    $routes->post('save_update/(:segment)', 'ManageEventController::save_update/$1', ['filter' => 'role:admin']);
    $routes->get('insert', 'ManageEventController::insert', ['filter' => 'role:admin']);
    $routes->post('save_insert', 'ManageEventController::save_insert', ['filter' => 'role:admin']);
    $routes->get('delete/(:segment)', 'ManageEventController::delete/$1', ['filter' => 'role:admin']);
});


// 5. Route manage souvenir place
$routes->group('manage_souvenir_place', function ($routes) {
    $routes->get('/', 'ManageSouvenirPlaceController::index', ['filter' => 'role:admin']);
    $routes->get('index', 'ManageSouvenirPlaceController::index', ['filter' => 'role:admin']);
    $routes->get('detail/(:segment)', 'ManageSouvenirPlaceController::detail/$1', ['filter' => 'role:admin']);
    $routes->get('edit/(:segment)', 'ManageSouvenirPlaceController::edit/$1', ['filter' => 'role:admin']);
    $routes->post('save_update/(:segment)', 'ManageSouvenirPlaceController::save_update/$1', ['filter' => 'role:admin']);
    $routes->get('insert', 'ManageSouvenirPlaceController::insert', ['filter' => 'role:admin']);
    $routes->post('save_insert', 'ManageSouvenirPlaceController::save_insert', ['filter' => 'role:admin']);
    $routes->get('delete/(:segment)', 'ManageSouvenirPlaceController::delete/$1', ['filter' => 'role:admin']);
});



// 6. Route manage culinary place
$routes->group('manage_culinary_place', function ($routes) {
    $routes->get('/', 'ManageCulinaryPlaceController::index', ['filter' => 'role:admin']);
    $routes->get('index', 'ManageCulinaryPlaceController::index', ['filter' => 'role:admin']);
    $routes->get('detail/(:segment)', 'ManageCulinaryPlaceController::detail/$1', ['filter' => 'role:admin']);
    $routes->get('edit/(:segment)', 'ManageCulinaryPlaceController::edit/$1', ['filter' => 'role:admin']);
    $routes->post('save_update/(:segment)', 'ManageCulinaryPlaceController::save_update/$1', ['filter' => 'role:admin']);
    $routes->get('insert', 'ManageCulinaryPlaceController::insert', ['filter' => 'role:admin']);
    $routes->post('save_insert', 'ManageCulinaryPlaceController::save_insert', ['filter' => 'role:admin']);
    $routes->get('delete/(:segment)', 'ManageCulinaryPlaceController::delete/$1', ['filter' => 'role:admin']);
});


// 7. Route manage worship place
$routes->group('manage_worship_place', function ($routes) {
    $routes->get('/', 'ManageWorshipPlaceController::index', ['filter' => 'role:admin']);
    $routes->get('index', 'ManageWorshipPlaceController::index', ['filter' => 'role:admin']);
    $routes->get('detail/(:segment)', 'ManageWorshipPlaceController::detail/$1', ['filter' => 'role:admin']);
    $routes->get('edit/(:segment)', 'ManageWorshipPlaceController::edit/$1', ['filter' => 'role:admin']);
    $routes->post('save_update/(:segment)', 'ManageWorshipPlaceController::save_update/$1', ['filter' => 'role:admin']);
    $routes->get('insert', 'ManageWorshipPlaceController::insert', ['filter' => 'role:admin']);
    $routes->post('save_insert', 'ManageWorshipPlaceController::save_insert', ['filter' => 'role:admin']);
    $routes->get('delete/(:segment)', 'ManageWorshipPlaceController::delete/$1', ['filter' => 'role:admin']);
});


// 8. Route manage facility
$routes->group('manage_facility', function ($routes) {
    $routes->get('/', 'ManageFacilityController::index', ['filter' => 'role:admin']);
    $routes->get('index', 'ManageFacilityController::index', ['filter' => 'role:admin']);
    $routes->get('detail/(:segment)', 'ManageFacilityController::detail/$1', ['filter' => 'role:admin']);
    $routes->get('edit/(:segment)', 'ManageFacilityController::edit/$1', ['filter' => 'role:admin']);
    $routes->post('save_update/(:segment)', 'ManageFacilityController::save_update/$1', ['filter' => 'role:admin']);
    $routes->get('insert', 'ManageFacilityController::insert', ['filter' => 'role:admin']);
    $routes->post('save_insert', 'ManageFacilityController::save_insert', ['filter' => 'role:admin']);
    $routes->get('delete/(:segment)', 'ManageFacilityController::delete/$1', ['filter' => 'role:admin']);
});









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
