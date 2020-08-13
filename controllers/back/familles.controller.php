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

    public function modification()
    {
        if(Security::verifAccessSession())
        {
            $idFamille = (int)Security::secureHtml($_POST['famille_id']);
            $libelle = Security::secureHtml( $_POST['famille_libelle']);
            $description = Security::secureHtml($_POST['famille_description']);

            $this->famillesManager->updateFamille($idFamille, $libelle, $description);

            $_SESSION['alert'] = [
                "message" => "La famille a été modifiée",
                "type" => "alert-success"
            ];

            header('location: '.URL."back/familles/visualisation");
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!"); 
        }
    }

    public function creationTemplate()
    {
        if(Security::verifAccessSession())
        {
            require_once "views/famillesCreation.view.php";
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!");
        }
    }

    public function creationValidation()
    {
        if(Security::verifAccessSession())
        {
            $libelle = Security::secureHtml( $_POST['famille_libelle']);
            $description = Security::secureHtml($_POST['famille_description']);
            $idFamille = $this->famillesManager->createFamille($libelle, $description);

            $_SESSION['alert'] = [
                "message" => "La famille a été crée avec ". $idFamille,
                "type" => "alert-success"
            ];
            header('location: '.URL."back/familles/visualisation");
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!");  
        }
    }




}