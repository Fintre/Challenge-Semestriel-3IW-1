<?php


namespace App;

use App\Controllers\Error;

date_default_timezone_set('Europe/Paris');
spl_autoload_register("App\myAutoloader"); //pour enregistrer une fonction d'autoload personnalisée

function myAutoloader(String $class): void
{
    //$class = App\Core\View
    $class = str_replace("App\\","", $class); //pour remplacer App\Core\View par Core\View
    //$class = Core\View
    $class = str_replace("\\","/", $class); //pour remplacer Core\View par Core/View
    //$class = Core/View
    if(file_exists($class.".php")){ //pour vérifier si le fichier existe
        include $class.".php"; //si oui, on l'inclut
    }
}


$uri = strtolower($_SERVER["REQUEST_URI"]); //pour récupérer l'uri et la mettre en minuscule
$uri = strtok($uri, "?"); //pour récupérer l'uri avant le ? (pour enlever les paramètres GET)
$uri = strlen($uri)>1 ? rtrim($uri, "/"):$uri; //pour supprimer le dernier / de l'uri si elle est supérieure à 1 caractère

if(!file_exists("routes.yaml")){ //pour vérifier si le fichier routes existe
    die("Le fichier de routing n'existe pas");
}
$listOfRoutes = yaml_parse_file("routes.yaml"); //pour récupérer le contenu du fichier routes


if( !empty($listOfRoutes[$uri]) ){ // si l'uri existe dans le fichier routes
    if( !empty($listOfRoutes[$uri]['controller']) ){ // si l'uri contient un controller
        if( !empty($listOfRoutes[$uri]['action']) ){ // si l'uri contient une action

            //on récupère le controller et l'action
            $controller = $listOfRoutes[$uri]['controller'];
            $action = $listOfRoutes[$uri]['action'];

            if(file_exists("Controllers/".$controller.".php")){ //si le fichier controller existe
                include "Controllers/".$controller.".php"; //on l'inclut
                $controller = "App\\Controllers\\".$controller; //on ajoute le namespace
                if(class_exists($controller)){ //si la classe du controller existe
                    $objectController = new $controller(); //on instancie le controller

                    if(method_exists($objectController, $action)){ //si l'action existe dans le controller
                        $objectController->$action();
                    }else {
                        die("L'action n'existe pas dans le controller");
                    }

                }else{
                    die("La classe du controller n'existe pas");
                }

            }else{
                die("Le fichier controller n'existe pas");
            }

        }else{
            die("La route ne contient pas d'action");
        }
    }else{
        die("La route ne contient pas de controller");
    }


}else{ //si l'uri n'existe pas dans le fichier routes
    echo $uri;
    require "Controllers/Error.php"; //page 404
    $customError = new Error();
    $customError->page404();
}
