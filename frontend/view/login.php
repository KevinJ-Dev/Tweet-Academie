<?php
include "meta.html";
include __DIR__ . '/../Database/loginController.php';
?>

<body class="bg-dark">
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <div class="text-center" cz-shortcut-listen="true">
            <div class="logo-tweet">
                <a href="#">
                    <div class="logo">
                        <img src="../../frontend/img/logo.png" alt="logo">
                    </div>
                </a>
            </div>
            <div class="login-form" style="max-width: 300px; margin:auto">
            <div id="message" ></div>

                <form class="form-signin m-auto" style="max-width: 300px;">
                <h1 class="h3 mb-3 font-weight-normal">SE CONNECTER</h1>
                <label for="inputEmail" class="sr-only">Mail</label>
                <div class="text-danger" id="message"></div>

                <input type="email" id="email" name="email" class="form-control" placeholder="Adresse mail..." required="" autofocus="">
                <label for="inputPassword"  class="sr-only">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe..." required="">
                <button class="btn btn-lg btn btn-info btn-block" id="submit"  type="submit" name="submit">Se connecter</button>
                <a class="btn btn-lg btn btn-info btn-block" href="?p=register">S'inscrire</a>
            </form>
        </div>
            <script type="text/javascript">
                var submit = $("#submit");
                $(submit).click(function(e) {
                    e.preventDefault();
                    var email = $("#email").val();
                    var password = $("#password").val();
                    var message = $("#message");

                    $.ajax({
                        type: "POST",
                        url: "../../backend/controller/loginController.php",
                        data: {
                            email: email,
                            password: password,
                        },
                        success: function(resultat, statut) {
                            if(resultat != "success")  {
                                $(message).addClass("alert alert-danger");

                                $(message).text(resultat);
                            }
                            else  {
                                window.location.href = "?p=app";
                                console.log("sucess");
                            }
                        }
                    });
                });
            </script>
</body>
</html>