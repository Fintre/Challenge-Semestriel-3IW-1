<?php

namespace App\Models;
use App\Core\DB;


class Post extends DB
{
    protected ?int $id;
    protected string $slug;
    protected string $title;
    protected string $body;
    protected ?int $published;
    protected ?int $isdeleted;

    protected ?string $createdat;
    protected ?string $type;

    protected ?int $theme_id;

    protected string $user_username;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme): void
    {
        $this->theme = $theme;
    }


    /**
     * @return mixed
     */
    public function getThemeId()
    {
        if (isset($this->theme_id)) {
            return $this->theme_id;
        }
    }

    /**
     * @param mixed $theme_id
     */
    public function setThemeId($theme_id): void
    {
        $this->theme_id = $theme_id;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        if (isset($this->id)) {
         return $this->id;
        }
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        if (isset($this->slug)) {
            return $this->slug;
        }
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        if (isset($this->title)) {
            return $this->title;
        }
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        if (isset($this->body)) {
            return $this->body;
        }
    }

    /**
     * @param mixed $body
     */
    public function setBody($body): void
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        if (isset($this->published)) {
            return $this->published;
        }
    }

    /**
     * @param mixed $published
     */
    public function setPublished($published): void
    {
        $this->published = $published;
    }

    /**
     * @return mixed
     */
    public function getIsDeleted()
    {
        if (isset($this->isdeleted)) {
            return $this->isdeleted;
        }
    }

    public function getCreatedat()
    {
        if (isset($this->createdat)) {
            return $this->createdat;
        }
    }

    public function validate(): array
    {
        $missingFields = array();

        if (empty($this->getSlug()) ) {
            $missingFields['slug'] = 'Le nom de la page est obligatoire';
        }

        if (empty($this->getTitle())) {
            $missingFields['title'] = 'Le titre de la page est obligatoire';
        }

        if (empty($this->getBody())) {
            $missingFields['body'] = 'Le contenu de la page est obligatoire';
        }

        return $missingFields;
    }

    public function __toString()
    {
        return "ID: " . $this->getId() . "\n" .
            "Slug: " . $this->slug . "\n" .
            "Title: " . $this->title . "\n" .
            "Body: " . $this->body . "\n" .
            "Type:" . $this->getType() . "\n" .
            "Published: " . $this->getPublished(). "\n" .
            "IsDeleted: " . $this->getIsDeleted() . "\n" .
            "Created At: " . $this->getCreatedat() . "\n" .
            "User Name:" . $this->getUserUsername() . "\n" ;
    }

    public function setIsdeleted(?int $isdeleted): void
    {
        $this->isdeleted = $isdeleted;
    }
    public function getNbElements() {
        return $this->countElements();
    }

    public function getElementsByType($column, $value) {
        return $this->countElements($column, $value);
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setUserUsername($user): void
    {
        $this->user_username = $user;
    }

    public function getUserUsername()
    {
        return $this->user_username;
    }

}
