<?php
session_start();

if (isset($_SESSION['connexionError'])) {
    echo "<p class='bg-danger'>" . $_SESSION['connexionError'] . "</p>";
}


include 'includes/autoload.inc';



?>

<!doctype html>
<html lang="fr">
<head>
    <title>connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
            crossorigin="anonymous"
    >
</head>
<body>

<div class="container">
    <form method="post" action="connexion-check.php">
        <div class="form-group">
            <label for="username">Nom</label><br />
            <input type="text" id="username" placeholder="nom" class="form-control" name="username" required>
        </div>
        <div classs="form-group">
            <label for="password">Mot de passe</label><br />
            <input type="password" id="password" placeholder="Mot de passe" name="password" class="form-control" required>
        </div><br />
        <button type="submit" class="btn"><a>Connexion</a></button>
    </form><br>
    <button class="btn">
        <a href="inscription.php">S'inscrire</a>
    </button>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</body>
</html>