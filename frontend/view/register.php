<?php
include "meta.html";
?>

<body>
    <div class="logo-tweet">
        <a href="#">
            <div class="logo">
                <img src="..\img\logo.png" alt="logo">
            </div>
        </a>
    </div>
    <div class="content-container">
        <div class="container-fluid">
            <div class="jumbotron">
                <div class="test_container connect-content">
                    <h2>Déjà inscrit ?</h2>
                    <input type="submit" name="create-connect" class="btn-send btn-connect" value="SE CONNECTER">
                </div>
                <div class="test_container register-content">
                    <h2>Créer un compte ?</h2>
                    <!-- Formulaire register -->
                    <section id="section1" class="py-3">
                        <div class="container">
                            <div class="col-md-12">
                                <form action="login.php" id="register-form">
                                    <!-- Pseudo -->
                                    <div class="label-center">
                                        <label for="pseudo">Pseudo</label>
                                    </div>
                                    <input id="firstname" type="text" name="pseudo" tabindex="1" required autofocus placeholder="Votre pseudo..">
                                    <!-- Email -->
                                    <div class="label-center">
                                        <label for="email">Email</label>
                                    </div>
                                    <input id="email" type="email" name="email" tabindex="2" required autofocus placeholder="Votre email..">
                                    <!-- Date -->
                                    <div class="label-center">
                                        <label for="date">Date de naissance</label>
                                    </div>
                                    <input id="birthday" type="date" name="birthday">
                                    <!-- Mot de passe -->
                                    <div class="label-center">
                                        <label for="inputPassword3">Mot de passe</label>
                                    </div>
                                    <input id="password" type="password" name="password" tabindex="3" required autofocus placeholder="Votre mot de passe..  ">
                                    <br>
                                    <div class="label-center">
                                        <input type="submit" name="create" class="btn-send btn-register" value="S'INSCRIRE">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
</html>