<?php

namespace App\Forms;

class EditUser
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"update-profile",
                "submit"=>"Sauvegarder les modifications",
                "enctype"=>"multipart/form-data",
                "class"=>"form"
            ],
            "inputs"=>[
                "Nom d'utilisateur"=>[
                    "type"=>"text",
                    "name" => "username",
                    "class" => "input-form",
                    "placeholder" => "Nom d'utilisateur",
                    "required"=>true,
                    "error"=>"Le nom d'utilisateur doit faire plus de 2 caractères"
                ],
                "E-mail"=>[
                    "type"=>"email",
                    "name" => "email",
                    "class" => "input-form",
                    "placeholder" => "Adresse email",
                    "required"=>true
                ],
                "Image de profil"=>[
                    "type"=>"file",
                    "name" => "profile_picture",
                    "class" => "input-form",
                    "placeholder" => "Image de profil",
                    "required"=>false, // Dépend de si tu veux forcer l'utilisateur à avoir une image de profil
                    "accept"=>"image/*" // Accepte uniquement les images
                ],
                "Nom"=>[
                    "type"=>"text",
                    "name" => "nom",
                    "class" => "input-form",
                    "placeholder" => "Nom",
                    "required"=>true,
                ],
                "Prénom"=>[
                    "type"=>"text",
                    "name" => "prenom",
                    "class" => "input-form",
                    "placeholder" => "Prénom",
                    "required"=>true,
                ],
                "Role"=>[
                    "type"=>"select",
                    "name" => "role",
                    "class" => "input-form",
                    "options"=> [
                        "admin" => "Administrateur",
                        "editor" => "Éditeur",
                        "user" => "Utilisateur"
                    ],
                    "required"=>true,
                    "error"=>"Veuillez sélectionner un rôle pour l'utilisateur"
                ],
                // Ajoute d'autres champs selon tes besoins...
            ]
        ];
    }
}
