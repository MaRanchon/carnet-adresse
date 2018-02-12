<?php
session_start();

use domain\User;
use dao\UserDao;
include 'includes/autoload.inc';
$config = include 'includes/config.inc';
$userDao = new UserDao($config);

$users = $userDao->findAllUsers();

$usernameInput = $_POST["username"];
$passwordInput = $_POST["password"];

if (isset($usernameInput) &&  isset($passwordInput)) {

    $usernameCheck = false;

    foreach ($users as $user) {
        if ($usernameInput === $user->username) {
            $usernameCheck = true;
            if ($passwordInput === $user->password) {
                $_SESSION["connexionError"] = "";
                $_SESSION["id_user"]= $user->id_user;
                header("Location: listeContacts.php");

            } else {
                $_SESSION["connexionError"] = "Mauvais mot de passe";
                header("Location: connexion.php");
            }
        }
    }

    if (!$usernameCheck) {
        $_SESSION["connexionError"] = "Pas d'utilisateur ayant ce nom";
        header("Location: connexion.php");
    }
}