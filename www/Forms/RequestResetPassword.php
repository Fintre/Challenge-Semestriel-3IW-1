<?php

namespace App\Forms;

class RequestResetPassword
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"requestResetPassword",
                "submit"=>"Demander un nouveau mot de passe",
                "class"=>"form"

            ],
            "inputs"=>[
                "E-mail"=>["type"=>"email", "class"=>"input-form", "placeholder"=>"Votre e-mail", "required"=>true, "error"=>"Votre email est incorrect"],
            ]
        ];
    }
}
