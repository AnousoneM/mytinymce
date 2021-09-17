<?php
session_start();

// Logique de connection basé sur session et cookie pour que nous ne puissions pas acceder à la page
$connected = false;

if (isset($_SESSION['connected']) || isset($_COOKIE['connected'])) {
    $connected = true;
} else {
    header('Location: login.php');
}
//////////////////////////////////////////////////

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

    <!-- Mise en place du script du captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
                        <label for="title" class="form-label fw-bold">Titre</label><span class="ps-1 text-danger fst-italic fw-lighter"><?= $errors['title'] ?? '' ?><span>
                                <input type="text" class="form-control" id="title" value="<?= $_POST['title'] ?? '' ?>" name="title" placeholder="Mon titre ...">
                    </div>

                    <textarea name="content" style="height: 25vw"><?= $_POST['content'] ?? '' ?></textarea>

                    <a href="../index.php" class="btn btn-secondary mt-2">Retour</a>
                    <button type="submit" name="btn-addArticle" class="btn btn-outline-secondary mt-2">Sauvegarder</button>
                    <p><span class="ps-1 text-danger fst-italic fw-lighter"><?= $errors['captcha'] ?? '' ?><span></p>

                </form>
            </div>
        </div>

    </div>

    <?php include realpath('includes') . '/footer.php' ?>

    <!-- DL en local des fichier JS -->
    <script src="../public/js/bootstrap.bundle.min.js"></script>

    <!-- Mise en place du script tiny MCE -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'image a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'image a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',


            // without images_upload_url set, Upload tab won't show up
            images_upload_url: '../controllers/controller-upload.php',

            // override default upload handler to simulate successful upload
            images_upload_handler: function(blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '../controllers/controller-upload.php');

                xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        console.log('perdu')
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },

            toolbar_mode: 'floating',
            a11y_advanced_options: true,
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            file_picker_types: 'file image media'
        });
    </script>

</body>

</html>