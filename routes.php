<?php

$routes = [
    'GET' => [
        '/' => ['controller' => 'HomeController', 'method' => 'LoginView'],
        'register' => ['controller' => 'HomeController', 'method' => 'RegisterView'],
        'verifikasi/{params}' => ['controller' => 'HomeController', 'method' => 'Verifikasi'],
        'dashboard' => ['controller' => 'HomeController', 'method' => 'UserView'],
        'dashboard-admin' => ['controller' => 'HomeController', 'method' => 'AdminView'],
    ],
    'POST' => [
        'login' => ['controller' => 'HomeController', 'method' => 'LoginProcess'],
        'register' => ['controller' => 'HomeController', 'method' => 'Register'],
    ]
];
