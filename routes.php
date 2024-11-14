<?php

$routes = [
    'GET' => [
        '/' => ['controller' => 'HomeController', 'method' => 'LoginView'],
        'register' => ['controller' => 'HomeController', 'method' => 'RegisterView'],
        'product/create' => ['controller' => 'HomeController', 'method' => 'create'],
    ],
    'POST' => [
        'register' => ['controller' => 'HomeController', 'method' => 'Register'],
    ]
];
