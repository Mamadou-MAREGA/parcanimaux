<?php
    
    //http:localhost/...
    //https:monsite.com/...
    define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http").
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

    require_once "controllers/front/API.controller.php";
    $apiController = new APIController();

    try {
        if(empty($_GET['page']))
        {
            throw new Exception("La page demandée n'existe pas !!!");
        }else{
            $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));

            if( empty($url[0]) || empty($url[1])) throw new Exception("La page n'existe pas !!!");

            switch ($url[0]) {
                case "front":
                    switch($url[1]){
                        case "animaux": 
                            if (!isset($url[2]) || !isset($url[3])) {
                                $apiController->getAnimaux(-1,-1);
                            }else{
                                $apiController->getAnimaux((int)$url[2],(int)$url[3]);
                            }
                        break;
                        case "animal":
                            if(empty($url[2])) throw new Exception("L'identifiant de l'animal est manquant");  
                            $apiController->getAnimal($url[2]);
                        break;
                        case "continents": $apiController->getContinents();
                        break;
                        case "familles": $apiController->getFamilles();
                        break;
                        default: throw new Exception("La page demandée n'existe pas ");
                    }

                break;
                
                case "back": echo "page back demandée";
                break;
                
                default: throw new Exception("La page demandée n'existe pas ");
               
            }
            
        }
    } catch (Exception $e) {
        $msg = $e->getMessage();
        echo $msg;
    }