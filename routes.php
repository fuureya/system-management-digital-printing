<?php

$routes = [
    'GET' => [
        '/' => ['controller' => 'HomeController', 'method' => 'LoginView'],
        'register' => ['controller' => 'HomeController', 'method' => 'RegisterView'],
        'verifikasi/{token}/{email}' => ['controller' => 'HomeController', 'method' => 'Verifikasi'],
    ],
    'POST' => [
        'register' => ['controller' => 'HomeController', 'method' => 'Register'],
    ]
];
