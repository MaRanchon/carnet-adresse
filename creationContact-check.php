<?php
session_start();
$id_user = $_SESSION["id_user"];

use domain\Contact;
use dao\ContactDao;
include 'includes/autoload.inc';
$config = include 'includes/config.inc';
$contactDao = new ContactDao($config);

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$dateNaissance = $_POST["dateNaissance"];
$numeroTel = $_POST["numeroTel"];
$email = $_POST["email"];

$newContact = new Contact($nom, $prenom, $dateNaissance, $numeroTel, $email);
$contactDao->insertContact($newContact, $id_user);

header("Location: listeContacts.php");