<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->setAutoRoute(true); // URL'leri denetleyici ve yöntemlerle otomatik eşleştirmeyi etkinleştirir.
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();



$routes->add('/', 'Home::index');
$routes->add('pages/(:any)', 'Home::index/$1');
$routes->get('blogList', 'Home::blogList');
$routes->get('product_list', 'Home::product_list');
$routes->add('category/(:any)', 'Home::blogCategory/$1');
$routes->get('about', 'Home::about');
$routes->get('contact', 'Home::contact');
$routes->get('tags', 'Home::tagList');
$routes->get('tag_add', 'Home::tagAddView');
$routes->post('tag_add', 'Home::tagAdd', ['as' => 'tag_add']);
$routes->get('tagUpdate/(:num)', 'Home::tagUpdateView/$1');
$routes->get('tagUpdate/(:num)', 'Home::tagUpdate/$1');
$routes->get('tagDelete/(:num)', 'Home::tagDelete/$1');
$routes->post('tagUpdate', 'Home::tagUpdate', ['as' => 'tagUpdate']);
$routes->get('tagUpdate/(:num)', 'Home::tagUpdateView/$1');
$routes->post('tagUpdate/(:num)', 'Home::tagUpdate/$1');
$routes->get('deletedTags', 'Home::deletedTags');
$routes->get('recoveryTag/(:num)', 'Home::recoveryTag/$1');
$routes->get('recoveryTag', 'Home::recoveryTag');













/* $routes->get('home/about', 'Home::about');
$routes->get('home/welcome_message', 'Home::welcome');
$routes->get('home/contact', 'Home::contact');
$routes->post('pageforms/contact_form', 'Pageforms::contact_form'); */ 



