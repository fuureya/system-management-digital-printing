<?php

function loadEnv($filePath = '.env')
{
    if (!file_exists($filePath)) {
        throw new Exception("File .env tidak ditemukan.");
    }

    // Baca setiap baris dalam file .env
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Abaikan baris komentar
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Pisahkan key dan value
        list($key, $value) = explode('=', $line, 2);

        // Hapus spasi atau tanda kutip pada value
        $key = trim($key);
        $value = trim($value);
        $value = trim($value, '"'); // Menghapus tanda kutip ganda di sekitar value

        // Set sebagai variabel environment
        putenv("$key=$value");

        // Definisikan juga sebagai variabel global jika diperlukan
        $_ENV[$key] = $value;
    }
}
