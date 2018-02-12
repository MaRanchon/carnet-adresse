<?php
session_start();

use domain\User;
use dao\UserDao;
include 'includes/autoload.inc';
$config = include 'includes/config.inc';
$userDao = new UserDao($config);

$users = $userDao->findAllUsers();


if (isset ($_POST["username"]) && isset($_POST["password"]) && isset ($_POST["passwordConfirmation"]) ) {

    $doublonCheck = true;

    foreach ($users as $user) {

        if ($_POST["username"] === $user->username) {
            $doublonCheck = false;
            $_SESSION["inscriptionError"] = "Nom déjà existant";
            header("Location: inscription.php");
        }
    }

    if ($doublonCheck) {
        if ($_POST["passwordConfirmation"] === $_POST["password"]) {
            $_SESSION["inscriptionError"] = "";
            $username = $_POST["username"];
            $password = $_POST["password"];

            $newUser = new User ($username, $password);

            $userDao->insertUser($newUser);

            header("Location: connexion.php");
        }
        else {
            $_SESSION["inscriptionError"] = "Les mots de passes ne correspondent pas";
            header("Location: inscription.php");
        }
    }
}