<?php

namespace App\Forms;

class InstallSite
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"run",
                "submit"=>"Installer le site",
                "class"=>"form"
            ],
            "inputs"=>[
                "admin_firstname"=>[
                    "type"=>"text",
                    "name" => "admin_firstname",
                    "class" => "input-form",
                    "placeholder" => "Prénom de l'admin",
                    "required"=>true,
                    "error"=>"Le prénom doit faire plus de 2 caractères",
                    "value"=>"admin",
                ],
                "admin_lastname"=>[
                    "type"=>"text",
                    "name" => "admin_lastname",
                    "class" => "input-form",
                    "placeholder" => "Nom de l'admin",
                    "required"=>true,
                    "error"=>"Le nom doit faire plus de 2 caractères",
                    "value"=>"admin",
                ],
                "admin_email"=>[
                    "type"=>"email",
                    "name" => "admin_email",
                    "class" => "input-form",
                    "placeholder" => "Email de l'admin",
                    "required"=>true,
                    "error"=>"Veuillez entrer un email valide",
                    "value"=>" ",
                ],
                "admin_username"=>[
                    "type"=>"text",
                    "name" => "admin_username",
                    "class" => "input-form",
                    "placeholder" => "Nom d'utilisateur admin",
                    "required"=>true,
                    "error"=>"Le nom d'utilisateur doit faire plus de 2 caractères",
                    "value"=>"admin",
                ],
                "admin_password"=>[
                    "type"=>"password",
                    "name" => "admin_password",
                    "class" => "input-form",
                    "placeholder" => "Mot de passe admin",
                    "required"=>true,
                    "error"=>"Le mot de passe doit être sécurisé",
                    "value"=>"Catalina.2003",
                ],
                ""=>[
                    "type"=>"text",
                    "name" => "admin_password_confirm",
                    "class" => "input-form",
                    "placeholder" => "Confirmer le mot de passe",
                    "required"=>true,
                    "error"=>"Les mots de passe ne correspondent pas",
                    "value"=>"Catalina.2003",
                ],
                "dbname"=>[
                    "type"=>"text",
                    "name" => "dbname",
                    "class" => "input-form",
                    "placeholder" => "Nom de la base de données",
                    "required"=>true,
                    "error"=>"Veuillez entrer le nom de la base de données",
                    "value"=>"admin",
                ],
                "dbuser"=>[
                    "type"=>"text",
                    "name" => "dbuser",
                    "class" => "input-form",
                    "placeholder" => "Utilisateur de la base de données",
                    "required"=>true,
                    "error"=>"Veuillez entrer l'utilisateur de la base de données",
                    "value"=>"admin",
                ],
                "dbpwd"=>[
                    "type"=>"password",
                    "name" => "dbpwd",
                    "class" => "input-form",
                    "placeholder" => "Mot de passe de la base de données",
                    "required"=>true,
                    "error"=>"Veuillez entrer le mot de passe de la base de données",
                    "value"=>"Catalina.2003",
                ],
                "table_prefix"=>[
                    "type"=>"text",
                    "name" => "table_prefix",
                    "class" => "input-form",
                    "placeholder" => "Préfixe pour les tables (ex: mysite_)",
                    "required"=>true,
                    "error"=>"Veuillez entrer un préfixe pour les tables de la base de données",
                    "value"=>"admin",
                ],
            ]
        ];
    }
}
