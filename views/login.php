<?php

session_start();

$connected = false;

var_dump($_POST);
var_dump($_SESSION);

/////////////////////////////////////////////////////////
// BASIC CONNEXION POUR ADMIN AVEC VARIABLE DE SESSION //
/////////////////////////////////////////////////////////

// url pour générer un hash : https://phppasswordhash.com/ sans faire de fonction

$login = '$2y$10$kwnhDY593UG75qcde3wPZuuGh8o48tbC7MqJuKdMzjVoRl/KGYUA6';
$password = '$2y$10$M0UksdElhYjyCi/ScslKIORiei59caIGeIUhqdzCOrRS8fS6oUfYW';

if (isset($_POST['btn-connection'])) {
    // nous verifions si le login et le mdp correspondent bien à l'aide de password_verify
    if (password_verify($_POST['mail'], $login) && password_verify(($_POST['password']), $password)) {
        // création d'une variable de session
        $_SESSION['connected'] = true;

        if ($_POST['stayConnected'] == 'on') {

            // faire attention au paramètre du cookie avec un path = '/'
            setcookie('connected', 'aqw741zsx963', time() + 3600, '/', false, false, true);
        }
        header('Location: ../index.php');
    }
}

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
</head>

<body>

    <div class="container">
        <div class="row pt-5 pb-3">
            <h1 class="text-center">@dm1n C0nn3x10n</h1>
        </div>
        <div class="row justify-content-center">
            <div class="shadow-lg col-4 p-4 mb-5">
                <form action="" method="POST" novalidate>
                    <div class="mb-3">
                        <label for="mail" class="form-label">Adresse mail</label>
                        <input type="email" class="form-control" name="mail" id="mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="stayConnected" id="stayConnected">
                        <label class="form-check-label" for="stayConnected">Rester connecté(e)</label>
                    </div>                    
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="btn-connection" id="btn-connection">Connexion</button>
                </form>
            </div>
        </div>

    </div>

    <?php

    include realpath('includes') . '/footer.php' ?>

    <!-- DL en local des fichier JS -->
    <script src="../public/js/bootstrap.bundle.min.js"></script>

</body>

</html>