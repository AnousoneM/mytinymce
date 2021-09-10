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
    <!-- chargement du script tinyMCE avec la clef de l'API -->
    <script src="https://cdn.tiny.cloud/1/l6zdzwloneftfo3c0co24lnp093q2uq0df3ypda2ggw3rbrs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

    <div class="container">
        <div class="row pt-5 pb-3">
            <h1 class="text-center">Recap' des articles écrits avec TinyMCE</h1>
        </div>
        <div class="row justify-content-center">
            <div class="table-responsive shadow-lg col-7 p-4 mb-5">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Titre</th>
                        <th class="text-center">Edit</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="view/articles.php" class="text-decoration-none text-reset"><i class="bi bi-file-text"></i> Article avec tiny MCE</a></td>
                            <td class="text-center"><a href=""><i class="bi bi-pencil-square"></i></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="view/articles.php" class="text-decoration-none text-reset"><i class="bi bi-file-text"></i> Article avec tiny MCE</a></td>
                            <td class="text-center"><a href=""><i class="bi bi-pencil-square"></i></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="view/articles.php" class="text-decoration-none text-reset"><i class="bi bi-file-text"></i> Article avec tiny MCE</a></td>
                            <td class="text-center"><a href=""><i class="bi bi-pencil-square"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">            
            <a href="views/write.php" class="btn btn-outline-dark btn-lg col-3">Nouvel Article<i class="bi bi-pen ps-3"></i></a>
        </div>

    </div>

    <!-- DL en local des fichier JS -->
    <script src="public/js/bootstrap.bundle.min.js"></script>

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