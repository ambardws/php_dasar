<?php

require 'functions.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");

    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="jquery.js"></script>
    <script src="script.js"></script>

    <title>Form Login</title>
</head>

<body>
    <form action="" method="post">
        <div class="card mx-auto" style="width: 25rem; margin-top: 120px;">
            <div class="card-body">
                <h3>Form Login</h3>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <input type="checkbox" id="checkbox"> Show Password
                <?php if (isset($error)) : ?>
                    <p style="color: red; font-style: italic">username/password salah</p>
                <?php endif ?>
                <hr>
                <button type="submit" class="btn btn-primary" style="width: 100%" name="login">Login</button>
            </div>

    </form>

    </div>

</body>

</html>