<?php

namespace App\Models;

use App\Core\DB;

class Post extends DB
{
    protected ?int $id;
    protected string $slug;
    protected string $title;
    protected ?string $description;
    protected string $body;

    protected ?string $type;
    protected bool $published;
    protected bool $isDeleted;

    //todo when login ok protected int $userId;

    public function __construct()
    {
        parent::__construct();
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
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
        return $this->isDeleted;
    }

    /**
     * @param mixed $isDeleted
     */
    public function setIsDeleted($isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @param mixed $createAt
     */
    public function setCreateAt($createAt): void
    {
        $this->createAt = $createAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
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
        return "ID: " . $this->id . "\n" .
            "Slug: " . $this->slug . "\n" .
            "Title: " . $this->title . "\n" .
            "Description: " . $this->description . "\n" .
            "Body: " . $this->body . "\n" .
            "Type: " . $this->type . "\n" .
            "Published: " . $this->published . "\n" .
            "IsDeleted: " . $this->isDeleted . "\n" .
            "Created At: " . $this->createAt . "\n" .
            "Updated At: " . $this->updatedAt . "\n" .
            "User ID: " . $this->userId . "\n" .
            "Site Setting ID: " . $this->siteSettingId . "\n";
    }

}