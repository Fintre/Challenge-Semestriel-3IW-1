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
                "admin_username"=>[
                    "type"=>"text",
                    "name" => "admin_username",
                    "class" => "input-form",
                    "placeholder" => "Nom d'utilisateur admin",
                    "required"=>true,
                    "error"=>"Le nom d'utilisateur doit faire plus de 2 caractères",
                ],
                "admin_password"=>[
                    "type"=>"password",
                    "name" => "admin_password",
                    "class" => "input-form",
                    "placeholder" => "Mot de passe admin",
                    "required"=>true,
                    "error"=>"Le mot de passe doit être sécurisé",
                ],
                "dbname"=>[
                    "type"=>"text",
                    "name" => "dbname",
                    "class" => "input-form",
                    "placeholder" => "Nom de la base de données",
                    "required"=>true,
                    "error"=>"Veuillez entrer le nom de la base de données",
                ],
                "dbuser"=>[
                    "type"=>"text",
                    "name" => "dbuser",
                    "class" => "input-form",
                    "placeholder" => "Utilisateur de la base de données",
                    "required"=>true,
                    "error"=>"Veuillez entrer l'utilisateur de la base de données",
                ],
                "dbpwd"=>[
                    "type"=>"password",
                    "name" => "dbpassword",
                    "class" => "input-form",
                    "placeholder" => "Mot de passe de la base de données",
                    "required"=>true,
                    "error"=>"Veuillez entrer le mot de passe de la base de données",
                ],
                "dbhost"=>[
                    "type"=>"text",
                    "name" => "dbhost",
                    "class" => "input-form",
                    "placeholder" => "Hôte de la base de données (habituellement localhost)",
                    "required"=>true,
                    "error"=>"Veuillez entrer l'hôte de la base de données",
                ],
                "table_prefix"=>[
                    "type"=>"text",
                    "name" => "table_prefix",
                    "class" => "input-form",
                    "placeholder" => "Préfixe pour les tables (ex: mysite_)",
                    "required"=>true,
                    "error"=>"Veuillez entrer un préfixe pour les tables de la base de données",
                ],
            ]
        ];
    }
}
