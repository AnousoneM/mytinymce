<?php

// la classe Articles hérite de la classe Database
class Articles extends Database
{
/**
 * add Article in our database
 *
 * @param string $title
 * @param string $content
 * @return boolean
 */
    public function addArticles(string $title, string $content): bool
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

        if ($addQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
