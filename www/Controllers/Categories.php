<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\Categorie;

class Categories
{

    public function allcategories(): void
    {
        echo "Mes categories";
    }

    public function newCategorie()
    {
        $myView = new View("Categories/newcategorie", "front");
    }

    public function editcategorie(): void
    {
        $myView = new View("Categories/editcategorie", "front");
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