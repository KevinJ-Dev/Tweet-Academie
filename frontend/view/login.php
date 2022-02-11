<?php
include "meta.html";
?>

<body>
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
            <label for="inputEmail" class="sr-only">Mail</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Adresse mail..." required="" autofocus="">
            <label for="inputPassword" name="password" class="sr-only">Mot de passe</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe..." required="">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
            <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
        </form>
    </div>
</div>
</body>
</html>