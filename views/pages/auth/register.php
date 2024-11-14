<?php

include_once 'views/partials/header.php';

?>

<div class="login-page">
    <div class="login-container">
        <h1>Register</h1>
        <form action="register" method="post">
            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" required autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-login btn-block">Login</button>
            <p class="text-muted mt-3">Sudah punya akun? <a href="./" style="color: #007bff;">Login dulu</a>.</p>
        </form>
    </div>
</div>


<?php

include_once 'views/partials/footer.php';

?>