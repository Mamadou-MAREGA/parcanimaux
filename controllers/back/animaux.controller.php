<?php

require_once "./controllers/back/Security.class.php";
require_once "./models/back/animaux.manager.php";
require_once "./models/back/familles.manager.php";
require_once "./models/back/continents.manager.php";
require_once "./controllers/back/util.php";

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

    public function suppression()
    {
        if(Security::verifAccessSession())
        {
            $idAnimal = (int)security::secureHtml($_POST['animal_id']);
            $image = $this->animauxManager->getImageAnimal($idAnimal);
            unlink("public/images/".$image);

            $this->animauxManager->deleteDBAnimalContinent($idAnimal);
            $this->animauxManager->deleteDBAnimal($idAnimal);


            $_SESSION['alert'] = [
                "message" => "L'animal a été supprimée",
                "type" => "alert-success"
            ];

            header('location: '.URL."back/animaux/visualisation");
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!");
            
        }
    }

    public function creation()
    {
        if(Security::verifAccessSession())
        {
            $famillesManager = new FamillesManager();
            $familles = $famillesManager->getFamilles();
            $continentsManager = new ContinentsManager();
            $continents = $continentsManager->getContinents(); 
            require_once "views/animalCreation.view.php";
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!");  
        }
    }
   

    public function creationValidation()
    {
        if(Security::verifAccessSession())
        {
            $nom = Security::secureHtml( $_POST['animal_nom']);
            $description = Security::secureHtml($_POST['animal_description']);
            $image = "";
            if ($_FILES['animal_image']['size'] > 0) 
            {
                $repertoire = "public/images/";
                $image = ajoutImage($_FILES['animal_image'],$repertoire);
            }
            $famille = (int) Security::secureHtml($_POST['famille_id']);

            $idAnimal = $this->animauxManager->createAnimal($nom, $description, $image, $famille);

            $continentsManager = new ContinentsManager();

            if(!empty($_POST['continent-1']))
            $continentsManager->addContinentAnimal($idAnimal,1);

            if(!empty($_POST['continent-2']))
            $continentsManager->addContinentAnimal($idAnimal,2);

            if(!empty($_POST['continent-3']))
            $continentsManager->addContinentAnimal($idAnimal,3);

            if(!empty($_POST['continent-4']))
            $continentsManager->addContinentAnimal($idAnimal,4);

            if(!empty($_POST['continent-5']))
            $continentsManager->addContinentAnimal($idAnimal,5);

            $_SESSION['alert'] = [
                "message" => "L'animal a été créé avec ". $idAnimal,
                "type" => "alert-success"
            ];
            header('location: '.URL."back/animaux/visualisation");
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!");  
        }
    }

    public function modification($idAnimal)
    {
        if(Security::verifAccessSession())
        {
            $famillesManager = new FamillesManager();
            $familles = $famillesManager->getFamilles();
            $continentsManager = new ContinentsManager();
            $continents = $continentsManager->getContinents(); 

            $lignesAnimal = $this->animauxManager->getAnimal((int)Security::secureHtml($idAnimal));
            $tabContinents = [];

            foreach($lignesAnimal as $continent)
            {
                $tabContinents[] = $continent['continent_id'];
            }
            $animal = array_slice($lignesAnimal[0],0,5);

            require_once "views/animalModification.view.php";
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!");  
        }
    
    }

    public function modificationValidation()
    {
        if(Security::verifAccessSession())
        {
            $idAnimal = Security::secureHtml($_POST['animal_id']);
            $nom = Security::secureHtml( $_POST['animal_nom']);
            $description = Security::secureHtml($_POST['animal_description']);
            $image = $this->animauxManager->getImageAnimal($idAnimal);
            if ($_FILES['animal_image']['size'] > 0)
            {
                unlink("public/images/".$image);
                $repertoire = "public/images/";
                $image = ajoutImage($_FILES['animal_image'],$repertoire);
            }
            $famille = (int) Security::secureHtml($_POST['famille_id']);
          
            $this->animauxManager->updateAnimal($idAnimal,$nom,$description,$image,$famille);

            $continents = [
                1 => !empty($_POST['continent-1']),
                2 => !empty($_POST['continent-2']),
                3 => !empty($_POST['continent-3']),
                4 => !empty($_POST['continent-4']),
                5 => !empty($_POST['continent-5'])
            ];

            $continentManager = new ContinentsManager();

            foreach ($continents as $key => $continent) {
                // continent coché et non présent BDD
                if($continents[$key] && !$continentManager->verificationExistenceAnimalContinent($idAnimal, $key)){
                    $continentManager->addContinentAnimal($idAnimal,$key);
                }

                // continent non coché et présent BDD
                if (!$continents[$key] && $continentManager->verificationExistenceAnimalContinent($idAnimal,$key)) {
                    $continentManager->deleteDBContinentAnimal($idAnimal,$key);
                }
            }

            $_SESSION['alert'] = [
                "message" => "L'animal a été modifié",
                "type" => "alert-success"
            ];
            header('location: '.URL."back/animaux/visualisation");
        }else{
            throw new Exception("Vous n'êtes pas connecter !!!!");  
        }
    }
}