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
                        <img src="..\img\logo.png" alt="logo">
                    </div>
                </a>
            </div>
            <div class="login-form">
                <form class="form-signin m-auto" style="max-width: 300px;">
                <h1 class="h3 mb-3 font-weight-normal">SE CONNECTER</h1>
                <label for="inputEmail" class="sr-only">Mail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Adresse mail..." required="" autofocus="">
                <label for="inputPassword"  class="sr-only">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe..." required="">
                <button class="btn btn-lg btn btn-info btn-block" id="submit"  type="submit" name="submit-connect">Se connecter</button>
                <button class="btn btn-lg btn btn-info btn-block" type="submit" name="submit-register" formaction="register.php">S'inscrire</button>
                    <div id="message" ></div>
            </form>
        </div>
            <script type="text/javascript">
                var submit = $("#submit");
                $(submit).click(function(e) {
                    var email = $("#email").val();
                    var password = $("#password").val();
                    var message = $("#message");

                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "../../backend/controller/loginController.php",
                        data: {
                            email: email,
                            password: password,
                        },
                        success: function(resultat, statut) {
                            if(resultat != "good")  {
                                $(message).text(resultat);

                            }
                            if (resultat == "good") {

                                window.location.href = "?p=app";

                                console.log("sucess");
                            }
                        }
                    });
                });
            </script>

</body>
</html>