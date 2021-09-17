<?php

// la classe Articles hérite de la classe Database
class Articles extends Database
{
    /**
     * add Article in our database
     *
     * @param string $title
     * @param string $content
     * @return boolean true when add ok
     */
    public function addArticle(string $title, string $content): bool
    {
        // on se connecte à la base de donnée via la méthode connectDatabase de la classe parent
        $database = Database::connectDatabase();
        // on stock la requête SQL dans query et nous plaçons des marqueurs nominatifs
        $query = "INSERT INTO `articles` (`articles_title`, `articles_content`, `articles_valid`) VALUES (:title, :content, :valid)";
        // on prepare notre requête avec la méthode prépare
        $addQuery = $database->prepare($query);
        // on lie les valeurs aux marqueurs nominatifs à l'aide de la méthode bindValue
        $addQuery->bindValue(':title', $title, PDO::PARAM_STR);
        $addQuery->bindValue(':content', $content, PDO::PARAM_STR);
        $addQuery->bindValue(':valid', 1, PDO::PARAM_INT); // nous plaçons arbitrairement une validité à 1

        // Nous testons si la requête s'execute bien
        if ($addQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get All Articles from Articles
     *
     * @return array
     */
    public function getAllArticles(): array
    {
        $database = Database::connectDatabase();
        $query = "SELECT * FROM `articles`";
        return $database->query($query)->fetchAll();
    }

    /**
     * Get infos from one article
     *
     * @param integer $article id de l'article
     * @return array
     */
    public function getOneArticle(int $article): array
    {
        $database = Database::connectDatabase();
        $query = "SELECT * FROM `articles` WHERE articles_id = :article";
        $getOneArticleQuery = $database->prepare($query);
        $getOneArticleQuery->bindValue(':article', $article, PDO::PARAM_INT);
        $getOneArticleQuery->execute();
        return $getOneArticleQuery->fetch();
    }

    /**
     * Update article in bdd
     *
     * @param string $title
     * @param string $content
     * @param integer $article
     * @return boolean true when update OK
     */
    public function updateArticle(string $title, string $content, int $article): bool
    {
        $database = Database::connectDatabase();
        $query = "UPDATE `articles` SET `articles_title` = :title, `articles_content` = :content WHERE `articles_id` = :article";
        $updateArticle = $database->prepare($query);
        $updateArticle->bindValue(':title', $title, PDO::PARAM_STR);
        $updateArticle->bindValue(':content', $content, PDO::PARAM_STR);
        $updateArticle->bindValue(':article', $article, PDO::PARAM_INT);
        // Nous testons si la requête s'execute bien
        if ($updateArticle->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete article in Bdd
     *
     * @param integer $article
     * @return boolean
     */
    public function deleteArticle(int $article): bool
    {
        $database = Database::connectDatabase();
        $query = "DELETE FROM `articles` WHERE `articles_id` = :article";
        $deleteQuery = $database->prepare($query);
        $deleteQuery->bindValue(':article', $article, PDO::PARAM_INT);
        if ($deleteQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
