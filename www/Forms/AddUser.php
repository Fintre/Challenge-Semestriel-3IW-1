<?php
namespace App\Forms;
class AddUser
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                        "method"=>"POST",
                        "action"=>"login",
                        "submit"=>"Ajouter Utilisateur",
                        "class"=>"form",
                        "id"=>"form-register"
                     ],
            "inputs"=>[
                "firstname"=>["type"=>"text","name"=>"prenom", "class"=>"input-form" , "placeholder"=>"prénom", "minlen"=>2, "required"=>true, "error"=>"Le prénom doit faire plus de 2 caractères"],
                "lastname"=>["type"=>"text","name"=>"nom", "class"=>"input-form", "placeholder"=>"nom", "minlen"=>2, "required"=>true, "error"=>"Le nom doit faire plus de 2 caractères"],
                "username"=>["type"=>"text","name"=>"username", "class"=>"input-form", "placeholder"=>"Nom d'utilisateur", "minlen"=>2, "required"=>true, "error"=>"Le nom doit faire plus de 2 caractères"],
                "email"=>["type"=>"email","name"=>"email", "class"=>"input-form", "placeholder"=>"email", "required"=>true, "error"=>"Le format de l'email est incorrect"],
                "pwd"=>["type"=>"password","name"=>"pwd", "class"=>"input-form", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
                "pwdConfirm"=>["type"=>"password", "class"=>"input-form", "confirm"=>"pwd" ,"placeholder"=>"confirmation", "required"=>true, "error"=>"Votre mot de passe de confirmation ne correspond pas"],
                "role"=>["type"=>"select", "class"=>"input-form", "options"=>["admin"=>"admin", "user"=>"user"], "placeholder"=>"role", "required"=>true, "error"=>"Veuillez choisir un rôle"],
            ]
        ];
    }

}
