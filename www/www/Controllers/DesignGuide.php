<?php

namespace App\Controllers;

use App\Core\View;

class DesignGuide
{
    public function index(): void
    {
        $filePath = '/var/www/html/public/framework/design-guide.html';
        $content = file_get_contents($filePath);
        echo $content;
    }
}
