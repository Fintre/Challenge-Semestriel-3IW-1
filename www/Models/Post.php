<?php
namespace App\Models;
use App\Core\DB;

class Post extends DB
{
    protected $id;
    protected $slug;
    protected $title;
    protected $description;
    protected $body;

    protected $type;
    protected $published;
    protected $isDeleted;
    protected $createAt;
    protected $updatedAt;
    protected $userId;
    protected $siteSettingId;

    public function __construct() {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
        return $this->slug;
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
        return $this->title;
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
        return $this->body;
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

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getSiteSettingId()
    {
        return $this->siteSettingId;
    }

    /**
     * @param mixed $siteSettingId
     */
    public function setSiteSettingId($siteSettingId): void
    {
        $this->siteSettingId = $siteSettingId;
    }



    public function __toString() {
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
    public function getNbElements() {
        return $this->countElements();
    }

    public function getElementsByType($column, $value) {
        return $this->countElements($column, $value);
    }

}
