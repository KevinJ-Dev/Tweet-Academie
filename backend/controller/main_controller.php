<?php

class main_controller {


    public function __construct($view_name)
    {
        include "../Tweet-Academie/frontend/view/$view_name.php";
    }

}

?>