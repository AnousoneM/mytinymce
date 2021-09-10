<?php

class Database
{
// paramètre de de connexion à la base de données
    private $dbname = 'mytinymce';
    private $username = 'root';
    private $password = '';

    /**
     * database connection function
     *
     * @return object PDO with database connection
     */
    protected function connectDatabase()
    {
        try {
            $database = new PDO("mysql:host=localhost;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            // DEBUG : affiche les erreurs SQL
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Nous retournons l'objet PDO qui est la connexion à notre base de données
            return $database;
            
        } catch (PDOException $errorMessage) {
            die('error : ' . $errorMessage->getMessage());
        }
    }
}
