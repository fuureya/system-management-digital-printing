<?php

require_once 'config/core/views.php';
class HomeController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Utama',
            'description' => 'Selamat datang di aplikasi kami.'
        ];

        // Panggil view home.index dan kirim data
        view('index', $data);
    }

    public function about()
    {
        echo "Ini adalah halaman about!";
    }
}
