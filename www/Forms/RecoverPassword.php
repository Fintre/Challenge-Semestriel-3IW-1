<?php

namespace App\Forms;

class RecoverPassword
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"recoverPassword",
                "submit"=>"Envoyer",
                "class"=>"form"
            ],
            "inputs"=>[
                "email"=>["type"=>"email", "class"=>"input-form", "placeholder"=>"email", "required"=>true, "error"=>"Votre email est incorrect"],
            ]
        ];
    }
}
