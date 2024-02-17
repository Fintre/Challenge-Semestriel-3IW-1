<?php
namespace App\Models;
use App\Core\DB;

class User extends DB
{
    protected ?int $id = null;
    protected string $firstname;
    protected string $lastname;
    protected string $username;
    protected string $email;
    protected string $roles;
    protected string $pwd;
    protected int $status;
    protected int $isDeleted;
    protected ?string $reset_token = null;
    protected ?string $reset_expires = null;
    protected ?string $activation_Token = null;
    protected bool $is_Active;



    public function __construct()
    {
        parent::__construct();
    }

    public function __toString()
    {
        return $this->getFirstname()." ".$this->getLastname();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $firstname = ucwords(strtolower(trim($firstname)));
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $lastname = strtoupper(trim($lastname));
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $email = strtolower(trim($email));
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     */
    public function setPwd(string $pwd): void
    {
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $this->pwd = $pwd;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    /**
     * @param bool $isDeleted
     */
    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
    public function getRoles(): string
    {
        return $this->roles;
    }

    /**
     * @param string $roles
     */
    public function setRoles(string $roles): void
    {
        $this->roles = $roles;
    }

    public function getResetToken(): string
    {
        return $this->reset_token;
    }

    public function setResetToken(?string $reset_token): void
    {
        $this->reset_token = $reset_token;
    }

    public function getResetExpires(): string
    {
        return $this->reset_expires;
    }

    public function setResetExpires(?string $reset_expires): void {
        $this->reset_expires = $reset_expires;
    }

    public function getActivationToken(): string
    {
        return $this->activation_Token;
    }

    public function setActivationToken(?string $activationToken): void
    {
        $this->activation_Token = $activationToken;
    }

    public function getIsActive(): bool
    {
        return $this->is_Active;
    }

    public function setIsActive(bool $is_Active): void
    {
        $this->is_Active = $is_Active;
    }


}
