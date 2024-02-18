<?php
namespace App\Models;
use App\Core\DB;

class Theme extends DB{
    private $id;
    private $name;
    private $description;

    public function __construct() {
        parent::__construct();
    }

    // Getters and setters for the properties

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getNbElements() {
        return $this->countElements();
    }
}
