<?php
require_once __DIR__ . '/../app/core/Router.php';

$router = new Router();

$router->get('',      'HomeController', 'index');
$router->get('home',  'HomeController', 'index');
$router->add('GET', 'error', 'ErrorController', 'notFound');

$router->dispatch();
