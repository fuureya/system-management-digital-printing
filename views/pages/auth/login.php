<?php
session_start();
include_once 'views/partials/header.php';

?>

<div class="login-page">
    <div class="login-container">
        <h1>Login</h1>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<script>alert('" . $_SESSION['error'] . "');</script>";
            unset($_SESSION['error']); // Hapus pesan setelah ditampilkan
        }
        ?>
        <form action="login" method="POST">
            <div class="form-group">
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-login btn-block">Login</button>
            <p class="text-muted mt-3">Belum punya akun? <a href="register" style="color: #007bff;">Register dulu</a>.</p>
        </form>
    </div>
</div>


<?php

include_once 'views/partials/footer.php';

?>