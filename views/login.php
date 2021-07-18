<!doctype html>
<html lang="en">

<?php
error_reporting(0);
include "../config/config.php";
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
    <link rel="shortcut icon" href="../assets/icon.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link href="../assets/bootstrap/css/signin.css" rel="stylesheet">
    <title>IOT</title>
</head>

<body>
    <?php
    if (isset($_SESSION['failed'])) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['failed'] ?>
        </div>
    <?php
    }
    ?>

    <form method="POST" class="form-signin">
        <div class="row">
            <img class="mb-4 mx-auto" src="../assets/logo.png" alt="logo" width="72" height="72">
        </div>
        <h1 class="h3 mb-3 font-weight-normal text-center">Basic IOT</h1>

        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>

        <p class="mt-5 mb-3 text-muted text-center">&copy; 2021 Fusionx Project</p>
    </form>
</body>

</html>