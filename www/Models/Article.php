<?php

namespace App\Models;

use App\Core\DB;

class Article extends DB
{
    protected int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


}