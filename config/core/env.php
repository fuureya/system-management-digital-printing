<?php

function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception(".env file not found at: " . $path);
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Abaikan baris yang dimulai dengan `#` sebagai komentar
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Memecah variabel dan nilainya
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        // Set ke environment menggunakan putenv() atau $_ENV
        putenv("$name=$value");
        $_ENV[$name] = $value;
    }
}

// Panggil fungsi loadEnv() untuk memuat .env
loadEnv(__DIR__ . '../../../.env');
