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

    public function LoginProcess()
    {
        require_once __DIR__ . '../../config/core/db.php';

        session_start(); // Pastikan session_start() dipanggil di awal

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query untuk memverifikasi pengguna
        $verify = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
        $result = mysqli_num_rows($verify);

        if ($result > 0) {
            $user = mysqli_fetch_assoc($verify);
            if (password_verify($password, $user['password'])) {
                if ($user['status'] == 1) {
                    $_SESSION['user'] = $user;
                    $_SESSION['role_id'] = $user["role_id"];
                    if ($_SESSION['role_id'] == 1) {
                        header('Location: ./dashboard-admin');
                    } elseif ($_SESSION['role_id'] == 2) {
                        header('Location: ./dashboard');
                    }
                    exit();
                } else {
                    $_SESSION['error'] = "Akun belum aktif";
                    header('Location: /digital-printing');
                    exit();
                }
            } else {
                $_SESSION['error'] = "Username/Password tidak terdaftar/salah";
                header('Location: /digital-printing');
                exit();
            }
        } else {
            $_SESSION['error'] = "Username/Password tidak terdaftar/salah";
            header('Location: /digital-printing');
            exit();
        }
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
        kirimEmail($email, $username);
    }

    public function Verifikasi($params)
    {
        require_once __DIR__ . '../../config/core/db.php';
        $verify = mysqli_query($db, "SELECT * FROM users WHERE username = '$params'");
        $result = mysqli_num_rows($verify);
        if ($result > 0) {
            // update status user
            mysqli_query($db, "UPDATE users SET status = 1 WHERE username = '$params'");
            header('location: /digital-printing');
        }
    }

    public function AdminView()
    {
        view('pages.dashboard.admin');
    }

    public function UserView()
    {
        view('pages.dashboard.user');
    }
}
