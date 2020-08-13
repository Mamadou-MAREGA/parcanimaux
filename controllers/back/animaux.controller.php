<?php

require_once "./controllers/back/Security.class.php";
require_once "./models/back/animaux.manager.php";

class AnimauxController{

     private $animauxManager;

    public function __construct(){
        $this->animauxManager = new AnimauxManager();
    }

    public function visualisation()
    {
        if(Security::verifAccessSession())
        {
            $animaux = $this->animauxManager->getAnimaux();
            require_once "views/animauxVisualisation.view.php";
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!");
            
        }
    }

   
}