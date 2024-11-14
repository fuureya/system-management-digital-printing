<?php

require_once __DIR__ . '/env.php';

$localhost = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');


// Membuat koneksi ke database
$db = mysqli_connect($localhost, $username, $password, $database);

// Cek koneksi
if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
