<?php

require_once '../models/Database.php';
require_once '../models/Articles.php';

// on déclare notre tableau d'erreurs
$errors = [];
// Mise en place d'une variable permettant de lancer la sweetAlerte
$addSuccess = 0;

// on déclenche les controles avant ajout de l'articles dans notre bdd au submit de notre bouton btn-addArticle
if (isset($_POST['btn-addArticle'])) {

    /////////////////////////////////
    // Mise en place des contrôles //
    /////////////////////////////////


    // Contrôle du captchaV2 
    //////////////////////////////

    // on stock la clef fourni dans l'admin captcha
    $secretKey = "6LdNUWscAAAAAO0-xVEZ9zbtOOtw_0U15G6RVBbA";
    // on recup' le post du g-recaptcha-response
    $captcha = $_POST['g-recaptcha-response'];
    // requête serveur via un POST
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
    // Nous récupérons la réponse de l'url
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true); // decode du json en tableau associatif avec le true

    // Nous testons la clé success pour savoir si nous avons un false
    if ($responseKeys['success'] === false) {
        $errors['captcha'] = 'Veuillez cocher le captcha';
    }

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


// Affichage d'un article selon le param' d'URL
if (isset($_GET['article'])) {
    $articlesObj = new Articles;
    $articleArray = $articlesObj->getOneArticle($_GET['article']);
}
