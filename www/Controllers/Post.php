<?php

class Post {
    private $id;
    private $title;
    private $body;
    private $type;
    private $published;
    private $createdAt;
    private $updatedAt;
    private $description;
    private $isDeleted;
    private $slug;
    private $userId;
    private $siteSettingsId;

    public function __construct($title, $body, $type, $published, $createdAt, $updatedAt, $description, $isDeleted, $slug, $userId, $siteSettingsId) {
        $this->title = $title;
        $this->body = $body;
        $this->type = $type;
        $this->userId = $userId;
        $this->siteSettingsId = $siteSettingsId;
        $this->published = $published;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->description = $description;
        $this->isDeleted = $isDeleted;
        $this->slug = $slug;
    }

    // Getter and Setter

    public function save(): void
    {
        echo "save the post";
    }

    public function update(): void
    {
        echo "update the post";
    }

    public function delete(): void
    {
        echo "delete the post";
    }

}

