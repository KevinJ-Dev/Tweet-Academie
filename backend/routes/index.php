<?php



include __DIR__ . "/../controller/main_controller.php";

include __DIR__ . "/../controller/app_controller.php";

//  URL example http://localhost:8080/index.php?p=register

// include "../../backend/controller/main_controller.php";
ob_start();



// code PHP
session_start();


// initialisation des routes
$page = 'welcome';
if (isset($_GET['p'])) {
    
    $page = $_GET['p'];
    
}

if($page === "") {

    $welcome = new main_controller("welcome");

}
//fin init des routes


// ------------------------------------------------------------------------------------


//Partit commune
// ecriture les lien html href= ?p= (votre page);

if($page === "welcome") {
  
    
}

if ($page === "login") { 

    if(!empty($_SESSION["email"])) {
        header('Location: ?p=app');
    
    } else {

        $login = new main_controller("login");

    }

}

if ($page === "register") { 


if(!empty($_SESSION["email"])) {
    header('Location: ?p=app');
} 
 $register = new main_controller("register");
}


if ($page === "app") {
    if(!empty($_SESSION["email"])) {
        $register = new app_controller("app");   

    } else {
        header('Location: ?p=welcome');

    }
    

}


if($page == "logout") {
    session_destroy();
    header('Location: ?p=welcome');
    
}

?>