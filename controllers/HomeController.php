<?php

require_once 'config/core/views.php';
class HomeController
{
    public function LoginView()
    {
        view('pages.auth.login');
    }


    public function RegisterView()
    {


        // Panggil view home.index dan kirim data
        view('pages.auth.register');
    }

    public function create()
    {
        $data = [
            'title' => 'Halaman product create',
            'description' => 'Selamat datang di product create page'
        ];

        // Panggil view home.index dan kirim data
        view('index', $data);
    }
}
