<?php

// cek apakah tombol submit sudah tekan atau belum
if (isset ($_POST["submit"])) {

// cek username dan password
    if ($_POST["username"] == "admin" && $_POST["password"] == "12345") {

// jika benar, redirect ke halaman admin
    header("Location: admin.php");
    exit;
// jika salah, tampilkan pesan kesalahan
    } else {
        $error = true;
    }
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
                <?php if (isset($error)) : ?>
                <p style="color: red; font-style: italic">username/password salah</p>
               <?php endif ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <input type="checkbox" id="checkbox"> Show Password

                <hr>
                <button type="submit" class="btn btn-primary" style="width: 100%" name="submit">Login</button>
            </div>
    </form>

    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>