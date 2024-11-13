<?php

$routes = [
    'GET' => [
        '/' => ['controller' => 'HomeController', 'method' => 'index'],
        '/about' => ['controller' => 'HomeController', 'method' => 'about'],
        '/product' => ['controller' => 'ProductController', 'method' => 'index'],
        '/product/create' => ['controller' => 'ProductController', 'method' => 'create'],
    ],
    'POST' => [
        '/product/store' => ['controller' => 'ProductController', 'method' => 'store'],
    ]
];
