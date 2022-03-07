<?php 
class app_controller{
    public function __construct($view_name){    
        include __DIR__ . "/../../frontend/view//app/$view_name.php";

        // include "../../frontend/view/$view_name.php";
        // include "../Tweet-Academie/frontend/view/$view_name.php";
    }
}
?>