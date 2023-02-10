<?php

use App\Visits;

$pageTitle = 'Log In';

$username = 'admin';
$hash_pwd = '$2y$10$QW8C/gxtsVGGraFsPiDoyONRTZGH2rvp.9uutkpHE7wFmqqOk1Wgm'; // corresponding password : admin
$message = null;
$error = null;

if (isset($_GET['logout']) && $_GET['logout'] == "1") {
    $_SESSION['connected'] = false;
}

if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
    header('Location: /');
}

if (isset($_GET['force']) && $_GET['force'] === "1") {
    $message = "You have to login before accessing the site";
}

if (isset($_POST['username'], $_POST['password'])) {
    if ($_POST['username'] == $username && password_verify($_POST['password'], $hash_pwd)) {
        $_SESSION['connected'] = true;
        header('Location: /');
    }
    $error = "Wrong username of password";
}
?>

<?php if ($message) : ?>
    <div class="alert alert-warning"><?= $message ?></div>
<?php endif ?>

<?php if ($error) : ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif ?>


<form action="/login" method="post">
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
    </div>
    <div class="form-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <button class="btn btn-primary">Log in</button>
</form>