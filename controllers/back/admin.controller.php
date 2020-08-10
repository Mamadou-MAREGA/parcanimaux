<?php

require_once "./controllers/back/Security.class.php";
require './models/back/admin.manager.php';


class AdminController{

    private $adminManager;

    public function __construct()
    {
        $this->adminManager = new AdminManager();
    }

    public function getPageLogin()
    {
        require_once "views/login.view.php";
    }

    public function getConnexion()
    {
        if (!empty($_POST['login']) && !empty(['password'])) {

            $login = Security::secureHtml($_POST['login']);
            $pass = Security::secureHtml($_POST['password']);
            
            if ($this->adminManager->isConnxionValid($login, $pass)) {
                $_SESSION['access'] = 'admin';
                header('location: '.URL."back/admin");
            }else {
                header('location: '.URL."back/login");
            }

        }
    }

    public function getAcceuilAdmin()
    {
        if (Security::verifAccessSession()) {
            require_once "views/acceuilAdmin.view.php";
        } else {
            header('location: '.URL."back/login");
        }   
        
    }

    public function getDeconnexion()
    {
        session_destroy();
        header('location: '.URL."back/login");
    }





}