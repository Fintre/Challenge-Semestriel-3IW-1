<?php

namespace App\Core;

class Verificator
{

    public function checkForm($config, $data, &$errors): bool
    {

        //Est-ce qu'on a le bon nb d'inputs
        if(count($config["inputs"]) != count($data))
        {
            die("Tentative de Hack");
        }else{
            //CSRF ???
            foreach ($config["inputs"] as $name=>$input){
                if(!isset($data[$name])){ //Est-ce que l'input existe
                    die("Tentative de Hack");
                }
                if($input["type"]=="email" && !self::checkEmail($data[$name])){ //Est-ce que l'email est valide
                    $errors[]="Email incorrect";
                }
                if($input["type"]=="password" && !self::checkPassword($data[$name])){ //Est-ce que le password est valide
                    $errors[]="Password incorrect";
                }
                if($name == "firstname" && !self::checkName($data[$name])){ //Est-ce que le prenom est valide
                    $errors[]="Prenom incorrect";
                }
                if($name == "lastname" && !self::checkName($data[$name])){ //Est-ce que le nom est valide
                    $errors[]="Nom incorrect";
                }
                if($name == "username" && !self::checkUsername($data[$name])){ //Est-ce que le username est valide
                    $errors[]="Username incorrect";
                }
            }

        }

        return empty($errors);
    }

    public static function checkPassword(String $password): bool
    {
        return (
            strlen($password) >= 8 &&
            preg_match("#[a-z]#", $password) &&
            preg_match("#[A-Z]#", $password) &&
            preg_match("#[0-9]#", $password)
        );
    }

    public static function checkEmail(String $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function checkName(String $name): bool
    {
        return preg_match("#[a-zA-Z]#", $name);
    }

    public static function checkUsername(String $username): bool
    {
        return preg_match("#[a-z0-9-_.]#", $username);
    }

}
