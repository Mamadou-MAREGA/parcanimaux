<?php

require_once "./controllers/back/Security.class.php";
require_once "./models/back/familles.manager.php";

class FamillesController{

    private $famillesManager;

    public function __construct(){
        $this->famillesManager = new FamillesManager();
    }

    public function visualisation()
    {
        if(Security::verifAccessSession())
        {
            $familles = $this->famillesManager->getFamilles();
            require_once "views/famillesVisualisation.view.php";
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!");
            
        }
    }

    public function suppression()
    {
        if(Security::verifAccessSession())
        {
            $id = (int)security::secureHtml($_POST['famille_id']);

            if($this->famillesManager->compterAnimaux($id) > 0 )
            {
                $_SESSION['alert'] = [
                    "message" => "La famille n'a pas été supprimée",
                    "type" => "alert-danger"
                ];
            }else{
                $this->famillesManager->delete($id);
                $_SESSION['alert'] = [
                    "message" => "La famille est supprimée",
                    "type" => "alert-success"
                ];
            }
            
            header('location: '.URL."back/familles/visualisation");
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!");
            
        }
    }




}