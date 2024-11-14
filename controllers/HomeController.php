<?php

require_once  './config/core/views.php';
require_once  './config/core/db.php';
require_once  './config/helpers/index.php';


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

    public function Register()
    {
        kirimEmail('agiljibrin009@gmail.com', 10);
    }
}
