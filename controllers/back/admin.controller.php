<?php

class AdminController{

    public function __construct()
    {
        
    }

    public function getPageLogin()
    {
        echo "Page de login";
        require_once "views/login.view.php";
    }





}