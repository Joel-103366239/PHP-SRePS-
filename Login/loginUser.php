<?php session_start() ?>
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
        <form method="post" action="userLogic.php" >
        <div class="container">
          <h1 class="h1">Login:  <small class="text-muted">User</small></h1>
          <div class="mb-3">
              <input type="text" class="form-control" name="uID" placeholder="Username" >
              <span class="text-danger"><?php if(isset($_SESSION['nameErr'])){ echo $_SESSION['nameErr']; unset($_SESSION['nameErr']); } ?></span>
          </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="uPWD" placeholder="Password" >
              <span class="text-danger"><?php if(isset($_SESSION['pwdErr'])){ echo $_SESSION['pwdErr']; unset($_SESSION['pwdErr']); } ?></span>
          </div>
          <div class="mb-3">
              <input type="submit" class="btn btn-primary" name="submit" >
              <a href="login.php" class="btn btn-danger float-end">Return</a>
          </div>
        </div>
        <div class="container">
            <span class="text-danger"><?php if(isset($_SESSION['Err'])){ echo $_SESSION['Err']; unset($_SESSION['Err']); } ?></span>
        </div>
    </body>
</html>