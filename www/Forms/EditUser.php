<?php

namespace App\Forms;

class EditUser
{
    private $userData;

    public function __construct($userData = [])
    {
        $this->userData = $userData;
    }
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
                    "error"=>"Le nom d'utilisateur doit faire plus de 2 caractères",
                    "value" => $this->userData['username'] ?? '',
                ],
                "E-mail"=>[
                    "type"=>"email",
                    "name" => "email",
                    "class" => "input-form",
                    "placeholder" => "Adresse email",
                    "required"=>true,
                    "error"=>"Veuillez entrer une adresse email valide",
                    "value" => $this->userData['email'] ?? '',
                ],
                "Image de profil"=>[
                    "type"=>"file",
                    "name" => "profile_picture",
                    "class" => "input-form",
                    "placeholder" => "Image de profil",
                    "required"=>false, // Dépend de si tu veux forcer l'utilisateur à avoir une image de profil
                    "accept"=>"image/*", // Accepte uniquement les images
                    "value" => $this->userData['img_path'] ?? '',
                ],
                "Nom"=>[
                    "type"=>"text",
                    "name" => "nom",
                    "class" => "input-form",
                    "placeholder" => "Nom",
                    "required"=>true,
                    "error"=>"Le nom doit faire plus de 2 caractères",
                    "value" => $this->userData['lastname'] ?? '',
                ],
                "Prénom"=>[
                    "type"=>"text",
                    "name" => "prenom",
                    "class" => "input-form",
                    "placeholder" => "Prénom",
                    "required"=>true,
                    "error"=>"Le prénom doit faire plus de 2 caractères",
                    "value" => $this->userData['firstname'] ?? '',
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
                    "error"=>"Veuillez sélectionner un rôle pour l'utilisateur",
                    "value" => $this->userData['roles'] ?? '',
                ],
                "Mot de passe"=>[
                    "type"=>"password",
                    "name" => "password",
                    "class" => "input-form",
                    "placeholder" => "Mot de passe",
                    "required"=>true,
                    "error"=>"Le mot de passe doit faire plus de 8 caractères",
                ],
                "Confirmer le mot de passe"=>[
                    "type"=>"password",
                    "name" => "password_confirm",
                    "class" => "input-form",
                    "placeholder" => "Confirmer le mot de passe",
                    "required"=>true,
                    "error"=>"Les mots de passe ne correspondent pas"
                ],
            ]
        ];
    }
}
