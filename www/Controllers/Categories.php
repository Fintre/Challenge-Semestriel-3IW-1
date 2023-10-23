<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\Categorie;

class Categories
{

    public function categories(): void
    {
        // recuperer la liste des categories de l'utilisateur et renvoyer la view qui affiche les posts

        echo "Mes categories";
    }

    public function newCategorie()
    {
        $myView = new View("Categories/new-categorie", "front");
    }
    public function save(): void
    {
        echo "save the categorie";
    }

    public function update(): void
    {
        echo "update the categorie";
    }

    public function delete(): void
    {
        echo "delete the categorie";
    }

}