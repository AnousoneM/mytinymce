<?php

session_start();

/////////////////////////////////////////////////////////
// DECO TOTALE //
/////////////////////////////////////////////////////////

session_unset();
session_destroy();
setcookie('connected', '', 0, '/');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Tiny MCE</title>
    <!-- DL en local des fichiers css -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <!-- CDN pour les icones BootStrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <div class="row pt-5 pb-3">
            <h1 class="text-center">8ye 8ye :'(</h1>
        </div>
        <div class="row justify-content-center">
            <div class="shadow-lg col-4 p-4 mb-5 text-center">
                <p class="h4">Vous êtes déconnecté(e)</p>
                <a href="../index.php" class="mt-2 btn btn-outline-dark">Accueil</a>
            </div>
        </div>

    </div>

    <?php

    include realpath('includes') . '\footer.php' ?>

    <!-- DL en local des fichier JS -->
    <script src="public/js/bootstrap.bundle.min.js"></script>

</body>

</html>