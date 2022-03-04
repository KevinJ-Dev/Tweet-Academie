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
                            <img src="../../frontend/img/logo.png" alt="logo">
                        </div>
                    </a>
                </div>


                <div class="login-form" id="login-form">
                    <form class="form-signin m-auto" style="max-width: 300px;">
                        <h1 class="h3 mb-3 font-weight-normal">S'INREGISTRER</h1>
                        <div class="label-center">

                            <div class="text-danger" id="message"></div>

                            <!-- Pseudo -->
                            <div class="label-cente">
                                <label for="pseudo">Pseudo</label>
                            </div>
                            <input class="form-control" id="pseudo" type="text" name="pseudo" tabindex="1" required
                                autofocus placeholder="Votre pseudo..">
                            <!-- Email -->
                            <div class="label-center">
                                <label for="email">Email</label>
                            </div>
                            <input class="form-control" id="email" type="email" name="email" tabindex="2" required
                                autofocus placeholder="Votre email..">
                            <div class="label-center">
                                <label for="date">Date de naissance</label>
                            </div>
                            <input class="form-control" id="birthday" type="date" name="birthday">
                            <!-- Mot de passe -->




                            <div class="label-center">
                                <label for="inputPassword3">Mot de passe</label>
                            </div>




                            <input class=" form-control" id="password" type="password" name="password" tabindex="3"
                                required autofocus placeholder="Votre mot de passe..  ">

                            <div class="label-center">
                                photo de profil
                            </div>

                            <input type="file" id="image_input">

                            <br>
                            <br>



                            <a class="btn btn-lg btn btn-info btn-block" href="?p=login">Se
                                connecter</a>
                            <button id="submit" class="btn btn-lg btn btn-info btn-block" type="submit"
                                name="submit-register">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    var submit = $("#submit");
    $(submit).click(function(e) {
        e.preventDefault();
        var input = $("input");


        for (let i = 0; i < input.length -1; i++) {
            if ($(input[i]).val() == "") {
                $(input[i]).css("border", "1px solid red")
            } else {
                $(input[i]).css("border", "1px solid #ced4da")
            }
        }

        var email = $("#email").val();
        var birthday = $("#birthday").val();
        var pseudo = $("#pseudo").val();
        var password = $("#password").val();

        var message = $("#message");
        send_photo(pseudo)

        $.ajax({
            type: "POST",
            url: "../../backend/controller/register_controller.php",    
            data: {

                email: email,
                birthday: birthday,
                pseudo: pseudo,
                password: password,
            },

            success: function(resultat, statut) {
                if (resultat != "good") {



                    $(message).addClass("alert alert-danger");

                    $(message).text(resultat);

                }
                if (resultat == "good") {

                    window.location.href = "?p=app";

                    console.log("sucess");
                }
            }
        });



    });



    function send_photo(pseudo) {

        console.log(pseudo)
        var fd = new FormData();
        var files = $("#image_input")[0].files[0];
        fd.append('file', files);
fd.append('pseudo', pseudo);
        $.ajax({
            type: "POST",
            url: "../../backend/controller/register_controller.php", 
            processData: false,  // tell jQuery not to process the data
       contentType: false,   
       cache: false, 
            data: fd, 
            success: function(resultat, statut) {
               console.log(resultat)
            }
        });
    }



    </script>
</body>

</html>