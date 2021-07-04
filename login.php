<!doctype html>
<html lang="en">

<?php
error_reporting(0);
include "config.php";
session_start();
$query = new Config();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($query->login($username, $password)) {
        header('location: panel.php');
    } else {
        $_SESSION['failed'] = "Username Atau Password Salah";
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>IOT</title>
</head>

<body>
    <div class="container my-3">
        <div class="d-flex justify-content-center">
            <div class="card col-md-6 my-5">
                <div class="card-body">
                    <div class="card-title text-center">
                        <h1>Login</h1>
                    </div>
                    <?php
                    if (isset($_SESSION['failed'])) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['failed'] ?>
                        </div>
                    <?php
                    }
                    ?>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" name="login" class="btn btn-primary text-center" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
        <strong class="text-center">©Fusionx Project 2021</strong>
    </div>

</body>

</html>