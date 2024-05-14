<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('product_list','Home::product_list');



$routes->setAutoRoute(true); // URL'leri denetleyici ve yöntemlerle otomatik eşleştirmeyi etkinleştirir.


/* $routes->get('home/about', 'Home::about');
$routes->get('home/welcome_message', 'Home::welcome');
$routes->get('home/contact', 'Home::contact');
$routes->post('pageforms/contact_form', 'Pageforms::contact_form'); */ 



