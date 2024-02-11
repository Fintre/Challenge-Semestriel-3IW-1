<?php

namespace App\Controllers;

use App\Core\View;

class SiteSettings{
    public function index()
    {
        $newUser = new View("Setting/index", "back");
        // Liste de tout les settings
    }
    public function create()
    {
// Page qui sera un form pour crée un setting personalisable
    }
    public function store()
    {
    // fonction appellée pour sauvegarder dans la bdd
    }

}