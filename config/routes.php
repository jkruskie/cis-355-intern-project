<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    $builder->connect('/', array('controller' => 'home', 'action' => 'index'));
    $builder->connect('/login', array('controller' => 'users', 'action' => 'login'));
    $builder->connect('/register', array('controller' => 'users', 'action' => 'register'));
    $builder->connect('/register/student', array('controller' => 'users', 'action' => 'registerStudent'));
    $builder->connect('/register/employer', array('controller' => 'users', 'action' => 'registerEmployer'));
    $builder->connect('/logout', array('controller' => 'users', 'action' => 'logout'));

    $builder->fallbacks();
});
