<?php

require_once __DIR__ .  '../../config/core/views.php';
require_once __DIR__ .  '../../config/helpers/index.php';

class HomeController
{
    public $database;
    // public function __construct()
    // {
    //     $this->database = require_once __DIR__ . '../../config/core/db.php';
    // }


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
        require_once __DIR__ . '../../config/core/db.php';

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Enkripsi password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Query untuk insert data
        $insert = "INSERT INTO users (username, email, password, role_id) VALUES ('$username', '$email', '$hashed_password', 2)";
        mysqli_query($db, $insert);
        kirimEmail($email, uniqid(5));
    }

    public function Verifikasi($token, $email)
    {
        require_once __DIR__ . '../../config/core/db.php';

        echo $email;
        // if ($token && $email) {
        //     $verify = "SELECT COUNT(*) FROM users WHERE email = $email";
        //     if (mysqli_query($db, $verify) > 0) {
        //         echo $verify;
        //     }
        //     $update_query = "UPDATE users SET status = 1 WHERE email = $email";
        // }
    }
}
