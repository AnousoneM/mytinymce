<?php
session_start();

/////////////////////////////////////////////////////////
// Logique de connection basé sur session et cookie ////
$connected = false;

if (isset($_SESSION['connected']) || isset($_COOKIE['connected'])) {
    $connected = true;
}
////////////////////////////////////////////////////////

require_once realpath('../controllers') . '/controller-articles.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Tiny MCE</title>
    <!-- DL en local des fichiers css -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- CDN pour les icones BootStrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- chargement du script tinyMCE avec la clef de l'API -->
    <script src="https://cdn.tiny.cloud/1/l6zdzwloneftfo3c0co24lnp093q2uq0df3ypda2ggw3rbrs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

    <div class="container pt-3">

        <div class="row justify-content-center">
            <div class="col-9 shadow-lg p-5 border">
                <h1 class="mb-5 mt-2 text-center"><?= $articleArray['articles_title'] ?></h1>

                <div class="mb-3">
                    <div><?= $articleArray['articles_content'] ?></div>
                </div>

                <a href="../index.php" class="btn btn-secondary mt-2">Retour</a>

            </div>
        </div>

    </div>

    <?php include realpath('includes') . '/footer.php' ?>

    <!-- DL en local des fichier JS -->
    <script src="../public/js/bootstrap.bundle.min.js"></script>

</body>

</html>