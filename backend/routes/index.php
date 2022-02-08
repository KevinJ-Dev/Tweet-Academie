<?php

include "../controller/main_controller.php";

ob_start();



// code PHP
session_start();




// initialisation des routes
$page = 'welcome';
if (isset($_GET['p'])) {
    
    $page = $_GET['p'];
    
}

if($page === "") {

    
}
//fin init des routes


// ------------------------------------------------------------------------------------


//Partit commune
// ecriture les lien html href= ?p= (votre page);

if($page === "welcome") {
  
    // vos includes
    
}
if ($page ==="login") { 
    // vos includes

    
}
if ($page ==="register") { 

 $register = new main_controller("register");

 

}

if ($page =="app") {        
       // vos includes
}


if($page == "logout") {
    session_destroy();
    header('Location: ?p=welcome');
    
}

?>