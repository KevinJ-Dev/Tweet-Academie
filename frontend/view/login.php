<?php
include "meta.html";
include __DIR__ . '/../Database/loginController.php';

session_start();
session_destroy();
session_unset();

if (isset($_POST['submit-connect']) && $_POST['submit-connect'] == "Se connecter") {

    $log = new loginController($_POST['email'], $_POST['password']);
    if ($log->checkAccount()) {
        session_start();
        $info = $log->getInfo($_POST['email']);
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        header('location:login.php');
    } else {
        $log->error('Adresse mail ou mot de passe incorrecte');
    }
}
?>

<body class="bg-dark">
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <div class="text-center" cz-shortcut-listen="true">
            <div class="logo-tweet">
                <a href="#">
                    <div class="logo">
                        <img src="..\img\logo.png" alt="logo">
                    </div>
                </a>
            </div>
            <div class="login-form">
                <form class="form-signin m-auto" style="max-width: 300px;">
                <h1 class="h3 mb-3 font-weight-normal">SE CONNECTER</h1>
                <label for="inputEmail" class="sr-only">Mail</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Adresse mail..." required="" autofocus="">
                <label for="inputPassword" name="password" class="sr-only">Mot de passe</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe..." required="">
                <button class="btn btn-lg btn btn-info btn-block" type="submit" name="submit-connect">Se connecter</button>
                <button class="btn btn-lg btn btn-info btn-block" type="submit" name="submit-register">S'inscrire</button>
                    <a href="index.php"><input type="button" name="submit" value="S'inscrire" /></a><br />
            </form>
        </div>
</body>
</html>