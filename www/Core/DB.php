<?php
namespace App\Core;

class DB
{
    private ?object $pdo = null;
    private string $table;

    public function __construct()
    {
        //connexion à la bdd via pdo
        try{
            $this->pdo = new \PDO("pgsql:host=postgres;port=5432;dbname=gfm;user=gofindme;password=gfmpwd");
        }catch (\PDOException $e) {
            echo "Erreur SQL : ".$e->getMessage();
        }

        $table = get_called_class(); //pour récupérer le nom de la classe qui a appelé la méthode
        $table = explode("\\", $table); //pour séparer le namespace du nom de la classe
        $table = array_pop($table); //pour récupérer le nom de la classe
        $this->table = "gfm_".strtolower($table); //pour mettre le nom de la table en minuscule et ajouter le préfixe gfm_
    }

    public function getAllData($table)
    {
        $sql = "SELECT * FROM " . $table;
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute();

        return $queryPrepared->fetchAll();
    }

    public function getArticlesAndBlogs($article)
    {
        $sql = "SELECT * FROM gfm_post WHERE type = '" . $article . "'";
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute();

        return $queryPrepared->fetchAll();
    }

    public function getDataObject(): array //pour récupérer les données de l'objet
    {
        return array_diff_key(get_object_vars($this), get_class_vars(get_class())); //mettre dans un tableau les données de l'objet
    }

    public function save() //pour insérer ou mettre à jour les données de l'objet dans la bdd
    {
        $data = $this->getDataObject();

        if( empty($this->getId())){ //si l'id est vide, on insère
            $sql = "INSERT INTO " . $this->table . "(" . implode(",", array_keys($data)) . ")
            VALUES (:" . implode(",:", array_keys($data)) . ")";
        }else{ //sinon on met à jour
            $sql = "UPDATE " . $this->table . " SET ";
            foreach ($data as $column => $value){
                $sql.= $column. "=:".$column. ",";
            }
            $sql = substr($sql, 0, -1);
            $sql.= " WHERE id = ".$this->getId();
        }


        $queryPrepared = $this->pdo->prepare($sql); //pour préparer la requête
        $queryPrepared->execute($data); //pour exécuter la requête
    }


    public static function populate(int $id): object
    {
        $class = get_called_class();
        $object = new $class();
        return $object->getOneBy(["id"=>$id], "object");
    }

    //$data = ["id"=>1] ou ["email"=>"y.skrzypczyk@gmail.com"]
    public function getOneBy(array $data, string $return = "array") //pour récupérer un enregistrement de la bdd
    {
        //SELECT * FROM gfm_user WHERE id=:id AND ...
        $sql = "SELECT * FROM ".$this->table. " WHERE ";
        foreach ($data as $column=>$value){
            $sql .= " ".$column."=:".$column. " AND";
        }
        $sql = substr($sql, 0, -3); //pour enlever le dernier AND
        $queryPrepared = $this->pdo->prepare($sql); //pour préparer la requête
        $queryPrepared->execute($data); //pour exécuter la requête
        if($return == "object"){//pour récupérer un objet
            $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class()); //les resultats seront sous forme d'objet de la classe appelée
        }

        return $queryPrepared->fetch(); //pour récupérer le résultat de la requête (un seul enregistrement)

    }
    public function delete(array $data)
    {
        // Use the getOneBy function to find the record to delete
        $recordToDelete = $this->getOneBy($data);

        if (!$recordToDelete) {
            // The record to delete doesn't exist
            return false;
        }

        // Build the DELETE SQL statement
        $sql = "DELETE FROM " . $this->table . " WHERE ";
        foreach ($data as $column => $value) {
            $sql .= " " . $column . "=:" . $column . " AND";
        }
        $sql = substr($sql, 0, -3); // Remove the last AND

        // Prepare and execute the DELETE query
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($data);

        // Check if the record was successfully deleted
        return $queryPrepared->rowCount() > 0;
    }

    public function checkUserCredentials(string $email, string $password): ?object
    {
        $user = $this->getOneBy(['email' => $email], 'object');
        if ($user && password_verify($password, $user->getPwd())) {
            return $user;
        }
        return null;
    }

}












