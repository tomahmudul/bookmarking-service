<?php

require_once('header.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $mysqli->query("SELECT * FROM users WHERE username='$username'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }
}
?>

<div class="container mt-5">

    <section class="mb-4">
        <h2>Login</h2>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </section>

</div>

<?php
require_once('footer.php');
?>

