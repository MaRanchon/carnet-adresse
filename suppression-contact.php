<?php
session_start();

use dao\ContactDao;
include 'includes/autoload.inc';
$config = include 'includes/config.inc';
$contactDao = new ContactDao($config);

$id = $_GET["id"];

$contactDao->deleteContact($id);

header ("Location: listeContacts.php");
