<?php 

require 'functions.php';

if ( isset($_POST["register"]) ) {

    if( register($_POST) > 0 )
    {
        echo "
            <script>
                alert('Register Succes');
                document.location.href = 'register.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Register Fail/Try Again');
                document.location.href = 'register.php';
            </script>
            ";
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


    <title>Form Register</title>
  </head>
  <body>
      
    <form action="" method="post">
        <div class="card mx-auto" style="width: 25rem; margin-top: 80px;">
            <div class="card-body">
                <h3>Form Register</h3>
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
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password2" class="form-control" id="password2">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>


                <hr>
                <button type="submit" class="btn btn-primary mb-2" style="width: 100%" name="register">Register</button>
                <a class="btn btn-primary" href="login.php" role="button" style="width: 100%">You Have Already Account? Sign In</a>
            </div>
    </form>

    </div>
    
</html>