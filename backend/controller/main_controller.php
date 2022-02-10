<?php

class main_controller {


    public function __construct($view_name)
    {
        include "../../frontend/view/$view_name.php";
    }

}

?>