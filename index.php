<?php
session_start();

/////////////////////////////////////////////////////////
// Logique de connection basé sur session et cookie /////
/////////////////////////////////////////////////////////
$connected = false;

if (isset($_SESSION['connected']) || isset($_COOKIE['connected'])) {
    $connected = true;
}
////////////////////////////////////////////////////////

require_once 'models/Database.php';
require_once 'models/Articles.php';

// Affichage de tous les articles 
$articlesObj = new Articles();
$allArticlesArray = $articlesObj->getAllArticles();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Tiny MCE</title>
    <!-- DL en local des fichiers css -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- CDN pour les icones BootStrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <div class="row pt-5 pb-3">
            <h1 class="text-center">Recap' des articles écrits avec TinyMCE</h1>
        </div>
        <div class="row justify-content-center">
            <div class="table-responsive shadow-lg col-7 p-5 mb-5">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Titre</th>
                        <th class="text-center">Edit</th>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($allArticlesArray as $article) { ?>
                            <tr>
                                <td class="fw-bold"><?= $article['articles_id'] ?></td>
                                <td class="align-middle"><a href="views/article.php?article=<?= $article['articles_id'] ?>" class="text-decoration-none text-reset"><i class="bi bi-file-text h5"></i> <?= $article['articles_title'] ?></a></td>
                                <td class="text-center">
                                    <a href="/" class="text-dark"><i class="bi bi-pencil-square h5 me-2"></i></a> / <a href="/" class="text-danger"><i class="bi bi-trash h5 ms-2"></i></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="views/write.php" class="btn btn-outline-dark btn-lg col-3">Nouvel Article<i class="bi bi-pen ps-3"></i></a>
        </div>

    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <i class="bi bi-moon-stars-fill"></i>
                    <span class="text-muted">&copy; 2021 MounLight Company, Inc</span>
                </a>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">

                <?php if ($connected) { ?>
                    <li class="ms-3">
                        <a class="text-muted text-decoration-none" href="views/deconnection.php">
                            Admin<i class="bi bi-door-open-fill ms-3"></i>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="ms-3">
                        <a class="text-muted text-decoration-none" href="views/login.php">
                            Connexion<i class="bi bi-person-bounding-box ms-3"></i>
                        </a>
                    </li>
                <?php } ?>


            </ul>
        </footer>
    </div>

    <!-- DL en local des fichier JS -->
    <script src="public/js/bootstrap.bundle.min.js"></script>

    <!-- Mise en place du CDN Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Mise en place de la sweetAlert -->
    <script>
        if (<?= isset($_SESSION['swal2']) ?>) {
            Swal.fire({
                text: '<?= $_SESSION['swal2'][0] ?? '' ?>',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
            // .then(() => window.location = '../index.php')
        }
    </script>

    <!-- maintenant que swal2 a été lancé, on reset la valeur de session avec un false -->
    <?php unset($_SESSION['swal2']); ?>

</body>

</html>