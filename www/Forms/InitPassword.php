<?php

namespace App\Forms;

class InitPassword
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"",
                //"submit"=>"Connexion",
                "class"=>"form"
            ],
            "inputs"=>[
                "pwd"=>["type"=>"password","name" => "pwd", "class"=>"input-form", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
                "pwdConfirm"=>["type"=>"password", "class"=>"input-form", "confirm"=>"pwd" ,"placeholder"=>"confirmation", "required"=>true, "error"=>"Votre mot de passe de confirmation ne correspond pas"],
            ]
        ];
    }


}
