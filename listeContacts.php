<?php
session_start();

use domain\Contact;
use dao\ContactDao;
include 'includes/autoload.inc';
$config = include 'includes/config.inc';
$contactDao = new ContactDao($config);

$id_user = $_SESSION["id_user"];

$contacts = $contactDao->findContactsByUser($id_user);
?>


<!doctype html>
<html lang="fr">
<head>
    <title>Liste des contacts</title>
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
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Numéro de téléphone</th>
            <th>Email</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>

        <?php

        foreach ($contacts as $contact) {
            ?>

            <tr>
                <td><?php echo $contact->nom; ?></td>
                <td><?php echo $contact->prenom; ?></td>
                <td><?php echo $contact->dateNaissance; ?></td>
                <td><?php echo $contact->numeroTel; ?></td>
                <td><?php echo $contact->email; ?></td>
                <td><a href="modification-contact.php?id=<?php echo $contact->id?>">
                        <button class="btn">
                            <span class="glyphicon glyphicon-pencil">
                            </span>
                        </button>
                    </a>
                </td>
                <td>
                    <a href="suppression-contact.php?id=<?php echo $contact->id?>">
                        <button class="btn">
                                <span class="glyphicon glyphicon-remove">
                                </span>
                        </button>
                    </a>
                </td>
            </tr>


        <?php }  ?>
    </table>
    <a class="btn" href="creationContact.php">Ajouter un contact</a>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</body>
</html>