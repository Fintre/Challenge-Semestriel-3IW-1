<?php
namespace App\Models;
use App\Core\DB;

class User extends DB
{
    private ?int $id = null;
    protected string $firstname;
    protected string $lastname;
    protected string $username;
    protected string $email;
    protected string $roles;
    protected string $pwd;
    protected int $status;
    protected int $isDeleted;


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

    public function saveResetToken($userId, $token, $expires) {
        $sql = "UPDATE " . $this->table . " SET reset_token = :token, reset_expires = :expires WHERE id = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['token' => $token, 'expires' => $expires, 'userId' => $userId]);
    }


    /**
     * Trouve un utilisateur par son token de réinitialisation et vérifie si le token n'a pas expiré.
     *
     * @param string $token Le token de réinitialisation.
     * @return mixed L'utilisateur si trouvé et le token est valide, sinon null.
     */
    public function getUserByResetToken(string $token) {
        $sql = "SELECT * FROM ".$this->table." WHERE reset_token = :token AND reset_expires > NOW()";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['token' => $token]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        return $stmt->fetch();
    }


    /**
     * Réinitialise le mot de passe d'un utilisateur en utilisant un token de réinitialisation.
     *
     * @param string $token Le token de réinitialisation.
     * @param string $newPassword Le nouveau mot de passe choisi par l'utilisateur.
     * @return bool True si le mot de passe a été réinitialisé avec succès, sinon false.
     */
    public function resetPassword(string $token, string $newPassword): bool {
        $user = $this->getUserByResetToken($token);

        if ($user) {
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE ".$this->table." SET pwd = :newPassword, reset_token = NULL, reset_expires = NULL WHERE id = :userId";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute(['newPassword' => $newPasswordHash, 'userId' => $user->id]);

            return $result;
        }

        return false;
}



}
