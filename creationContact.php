<?php
session_start();

include 'includes/autoload.inc';

$id_user = $_SESSION["id_user"];

if (isset($_SESSION['creationContactError'])) {
    echo "<p class='bg-danger'>" . $_SESSION['creationContactError'] . "</p>";
}



?>

<!doctype html>
<html lang="fr">
<head>
    <title>Création contact</title>
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
    <form method="post" action="creationContact-check.php">
        <div class="form-group">
            <label for="nom">Nom *</label><br />
            <input type="text" id="nom" placeholder="nom" class="form-control" name="nom" required>
        </div>
        <div classs="form-group">
            <label for="prenom">Prénom *</label><br />
            <input type="text" id="prenom" placeholder="Prénom" class="form-control" name="prenom" required>
        </div><br />
        <div class="form-group">
            <label for="dateNaissance">Date de Naissance</label><br>
            <input type="date" id="dateNaissance" placeholder="" class="form-control" name ="dateNaissance">
        </div>
        <div class="form-group">
            <label for="numeroTel">Numéro de téléphone</label><br>
            <input type="number" id="numeroTel" placeholder="Numéro" class="form-control" name ="numeroTel">
        </div>
        <div class="form-group">
            <label for="email">email</label><br>
            <input type="text" id="email" placeholder="email" class="form-control" name ="email">
        </div>
        <button type="submit" class="btn">Créer le contact</button>
    </form>
</div>




<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</body>
</html>

