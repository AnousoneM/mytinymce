<?php
require_once '../controllers/controller-articles.php';
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

    <!-- chargement du script tinyMCE avec la clef de l'API -->
    <script src="https://cdn.tiny.cloud/1/l6zdzwloneftfo3c0co24lnp093q2uq0df3ypda2ggw3rbrs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

    <div class="container pt-3">

        <div class="row justify-content-center">
            <div class="col-10 shadow-lg p-5 border">
                <h1 class="mb-5 mt-2 text-center">Création d'un article</h1>
                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Titre</label><span class="ps-1 text-danger fst-italic fw-lighter">Champs obligatoire / Saisie non-conforme<span>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Mon titre ...">
                    </div>

                    <textarea name="content" style="height: 25vw"></textarea>
                    <button type="submit" name="btn-addArticle" class="btn btn-secondary mt-2">Sauvegarder</button>
                </form>
            </div>
        </div>

    </div>

    <!-- Mise en place du CDN Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DL en local des fichier JS -->
    <script src="public/js/bootstrap.bundle.min.js"></script>

    <!-- Mise en place de la sweetAlert -->
    <script>
        if (<?= $addSuccess ?>) {
            Swal.fire({
                text: 'Article ajouté !',
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then(() => window.location = '../index.php')
        }
    </script>

    <!-- Mise en place du script tiny MCE -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>

</body>

</html>