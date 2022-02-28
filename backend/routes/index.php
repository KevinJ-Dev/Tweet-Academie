<?php




//  URL example http://localhost:8080/index.php?p=register
include __DIR__ . "/../controller/main_controller.php";

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
    // vos includes

    $login = new main_controller("login");

}

if ($page === "register") { 

    
if(!empty($_SESSION["email"])) {
    $register = new main_controller("app");

}
else {
    $register = new main_controller("register");

}
}


if ($page == "app") {        
       // vos includes
}


if($page == "logout") {
    session_destroy();
    header('Location: ?p=welcome');
    
}

?>