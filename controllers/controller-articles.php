<?php

require_once '../models/Database.php';
require_once '../models/Articles.php';

// on déclare notre tableau d'erreurs
$errors = [];
// Mise en place d'une variable permettant de lancer la sweetAlerte
$addSuccess = 0;

// on déclenche les controles avant ajout de l'articles dans notre bdd au submit de notre bouton btn-addArticle
if (isset($_POST['btn-addArticle'])) {

    // nous déclenchons l'ajout de l'articles quand il n'y a pas d'erreurs 
    if (count($errors) == 0) {
        // on sécurise à l'aide d'un htmlspécialchars
        $title = htmlspecialchars($_POST['title']);
        // ATTENTION DE NE PAS LE HTML SPECIALCHARISER !!! //
        $content = $_POST['content'];

        $articlesObj = new Articles; // on instancie un obj selon la classe Articles
        // Nous utilisons une conditions pour nous assurer que la requête est OK
        if ($articlesObj->addArticles($title, $content)) {
            $addSuccess = true;
        } else {
            $errors['addArticles'] = 'Erreur lors d\'ajout de l\'article, veuillez rééssayer';
        }
    }
}