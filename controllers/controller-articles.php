<?php

require_once '../models/Database.php';
require_once '../models/Articles.php';

// on déclare notre tableau d'erreurs
$errors = [];


///////////////////////////////////////////////////
// LANCEMENT DES CONTROLES SELON LES POST /////////
///////////////////////////////////////////////////

// on déclenche les controles avant la modification de l'articles dans notre bdd au submit de notre bouton btn-modifyArticle
if (isset($_POST['btn-modifyArticle'])) {

    /////////////////////////////////
    // Mise en place des contrôles //
    /////////////////////////////////

    // nous déclenchons l'ajout de l'articles quand il n'y a pas d'erreurs 
    if (count($errors) == 0) {
        // on sécurise à l'aide d'un htmlspécialchars
        $title = htmlspecialchars($_POST['title']);
        // ATTENTION DE NE PAS LE HTML SPECIALCHARISER !!! //
        $content = $_POST['content'];
        $article = htmlspecialchars($_POST['btn-modifyArticle']);

        $articlesObj = new Articles; // on instancie un obj selon la classe Articles
        // Nous utilisons une conditions pour nous assurer que la requête est OK
        if ($articlesObj->updateArticle($title, $content, $article)) {
            $_SESSION['swal2'][] = "Article $article modifié" ;
            header('Location: ../index.php');
        } else {
            $errors['addArticles'] = 'Erreur lors de la modification de l\'article, veuillez rééssayer';
        }
    }
}

// on déclenche les controles avant ajout de l'articles dans notre bdd au submit de notre bouton btn-addArticle
if (isset($_POST['btn-addArticle'])) {

    /////////////////////////////////
    // Mise en place des contrôles //
    /////////////////////////////////

    // nous déclenchons l'ajout de l'articles quand il n'y a pas d'erreurs 
    if (count($errors) == 0) {
        // on sécurise à l'aide d'un htmlspécialchars
        $title = htmlspecialchars($_POST['title']);
        // ATTENTION DE NE PAS LE HTML SPECIALCHARISER !!! //
        $content = $_POST['content'];

        $articlesObj = new Articles; // on instancie un obj selon la classe Articles
        // Nous utilisons une conditions pour nous assurer que la requête est OK
        if ($articlesObj->addArticle($title, $content)) {
            $_SESSION['swal2'][] = 'Article enregistré';
            header('Location: ../index.php');
        } else {
            $errors['addArticles'] = 'Erreur lors d\'ajout de l\'article, veuillez rééssayer';
        }
    }
}


///////////////////////////////////////////////////
// Affichage d'un article selon le param' d'URL ///
///////////////////////////////////////////////////

if (isset($_GET['article'])) {
    $articlesObj = new Articles;
    $articleArray = $articlesObj->getOneArticle($_GET['article']);
}
