<?php

function view($path, $data = [])
{
    // Ekstrak data sehingga bisa digunakan sebagai variabel di view
    extract($data);

    // Ganti titik menjadi slash pada path, misalnya "home.index" menjadi "home/index"
    $path = str_replace('.', '/', $path);

    // Tentukan path file view
    $file = "views/{$path}.php";

    // Cek apakah file view ada
    if (file_exists($file)) {
        require $file;
    } else {
        echo "View {$file} tidak ditemukan.";
    }
}
