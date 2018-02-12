<?php
session_start();


if (isset($_SESSION['inscriptionError'])) {
    echo "<p class='bg-danger'>" . $_SESSION['inscriptionError'] . "</p>";
}


include 'includes/autoload.inc';


?>

<!doctype html>
<html lang="fr">
<head>
    <title>inscription</title>
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
    <form method="post" action="inscription-check.php">
        <div class="form-group">
            <label for="username">Nom</label><br />
            <input type="text" id="username" placeholder="nom" class="form-control" name="username" required>
        </div>
        <div classs="form-group">
            <label for="password">Mot de passe</label><br />
            <input type="password" id="password" placeholder="Mot de passe" class="form-control" name="password" required>
        </div><br />
        <div class="form-group">
            <label for="passwordConfirmation">Confirmation du mot de passe</label><br>
            <input type="password" id="passwordConfirmation" placeholder="Confirmer le mot de passe" class="form-control" name ="passwordConfirmation" required>
        </div>
        <button type="submit" class="btn">Inscription</button>
    </form>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</body>
</html>

