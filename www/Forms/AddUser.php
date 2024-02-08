<?php
namespace App\Forms;
class AddUser
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                        "method"=>"POST",
                        "action"=>"register",
                        "submit"=>"Ajouter Utilisateur",
                        "class"=>"form",
                        "id"=>"form-register"
                     ],
            "inputs"=> [
                "firstname"=>["type"=>"text", "class"=>"input-form", "id"=>"firstname", "placeholder"=>"prénom", "minlen"=>2, "required"=>true, "error"=>"Le prénom doit faire plus de 2 caractères"],
                "lastname"=>["type"=>"text", "class"=>"input-form","id"=>"lastname", "placeholder"=>"nom", "minlen"=>2, "required"=>true, "error"=>"Le nom doit faire plus de 2 caractères"],
                "username"=>["type"=>"text", "class"=>"input-form","id"=>"username", "placeholder"=>"Nom d'utilisateur", "minlen"=>2, "required"=>true, "error"=>"Le nom doit faire plus de 2 caractères"],
                "email"=>["type"=>"email", "class"=>"input-form","id"=>"email", "placeholder"=>"email", "required"=>true, "error"=>"Le format de l'email est incorrect"],
                "pwd"=>["type"=>"password", "class"=>"input-form","id"=>"pwd", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
                "pwdConfirm"=>["type"=>"password", "class"=>"input-form","id"=>"pwdConfirm", "confirm"=>"pwd" ,"placeholder"=>"confirmation", "required"=>true, "error"=>"Votre mot de passe de confirmation ne correspond pas"],
                "role"=>["type"=>"text", "class"=>"input-form","id"=>"role", "placeholder"=>"role", "required"=>true, "error"=>"Veuillez choisir un rôle"]
            ]
        ];
    }

}
