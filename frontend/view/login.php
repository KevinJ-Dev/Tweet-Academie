<?php
include "meta.html";
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
            </form>
        </div>
</body>
</html>