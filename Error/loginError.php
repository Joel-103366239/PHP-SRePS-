<?php 
session_start() 
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body class="container">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <h1 class="display-4"><img src="../Logo/logo.png" class="rounded " alt="logo" height= 70rem width=70em>People's Health Pharmacy</h1>
            </div>
        </nav>
          <div class="container">
             <!--Intentionally Empty-->
          </div>
        <div class="container">
            <h1>Access Denied!</h1>
            <h2>You have to be logged in to view this page.....</h2>
            <a href="../Login/login.php" class="btn btn-dark mx-1" role="button">Login</a>
        </div>
    </body>
</html>