<?php
namespace dao;

use domain\Contact;
include 'includes/autoload.inc';

class ContactDao extends DaoBase
{

    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function findAllContacts() {
        $result = [];

        $reponse = $this->bdd->query("SELECT nom, prenom, dateNaissance, numeroTel, email FROM contacts ORDER BY id");

        while ($donnees = $reponse->fetch()) {
            $nom = $donnees["nom"];
            $prenom = $donnees["prenom"];
            $dateNaissance = $donnees["dateNaissance"];
            $numeroTel = $donnees["numeroTel"];
            $email = $donnees["email"];

            $foundContact = new Contact($nom, $prenom, $dateNaissance, $numeroTel, $email);
            $result[] = $foundContact;
        }

        return $result;
    }

    public function findContactsByUser($id_user) {
        $result = [];

        $query = $this->bdd->prepare("SELECT nom, prenom, dateNaissance, numeroTel, email, id FROM contacts WHERE id_user = :id_user ORDER BY nom");
        $query->bindParam(":id_user", $id_user);
        $query->execute();

        while ($donnees = $query->fetch()) {
            $nom = $donnees["nom"];
            $prenom = $donnees["prenom"];
            $dateNaissance = $donnees["dateNaissance"];
            $numeroTel = $donnees["numeroTel"];
            $email = $donnees["email"];
            $foundContact = new Contact($nom, $prenom, $dateNaissance, $numeroTel, $email);
            $foundContact->id = $donnees["id"];
            $result[] = $foundContact;
        }

        return $result;
    }

    public function findContactById($id) {
        $result = "";

        $query = $this->bdd->prepare("SELECT nom, prenom, dateNaissance, numeroTel, email, id FROM contacts WHERE id = :id");
        $query->bindParam(":id", $id);

        if($query->execute()) {
            if ($donnees = $query->fetch()) {
                $nom = $donnees["nom"];
                $prenom = $donnees["prenom"];
                $dateNaissance = $donnees["dateNaissance"];
                $numeroTel = $donnees["numeroTel"];
                $email = $donnees["email"];
                $foundContact = new Contact($nom, $prenom, $dateNaissance, $numeroTel, $email);
                $foundContact->id = $donnees["id"];
                $result = $foundContact;
            }
        }

        return $result;

    }

    public function findContactByName($nameInput) {
        $result = [];

        $query = $this->bdd->prepare("SELECT nom, prenom, dateNaissance, numeroTel, email FROM contacts WHERE nom = :nameInput OR prenom = :nameInput");
        $query->bindParam(":nameInput", $nameInput);

        if ($query->execute()) {
            while ($donnees = $query->fetch()) {
                $nom = $donnees["nom"];
                $prenom = $donnees["prenom"];
                $dateNaissance = $donnees["dateNaissance"];
                $numeroTel = $donnees["numeroTel"];
                $email = $donnees["email"];

                $foundContact = new Contact($nom, $prenom, $dateNaissance, $numeroTel, $email);
                $result[] = $foundContact;
            }
        }
        return $result;
    }

    public function insertContact($contact, $id_user = null) {
        $query = $this->bdd->prepare("INSERT INTO contacts(id_user, nom, prenom, dateNaissance, numeroTel, email) VALUES (:id_user, :nom, :prenom, :dateNaissance, :numeroTel, :email) ");
        $query->bindParam(":id_user", $id_user);
        $query->bindParam(":nom", $contact->nom);
        $query->bindParam(":prenom", $contact->prenom);
        $query->bindParam(":dateNaissance", $contact->dateNaissance);
        $query->bindParam(":numeroTel", $contact->numeroTel);
        $query->bindParam(":email", $contact->email);
        $query->execute();
    }

    public function deleteContact($id) {
        $query = $this->bdd->prepare("DELETE FROM contacts WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
    }

    public function updateContact($contact, $id) {
        $query = $this->bdd->prepare("UPDATE contacts SET nom = :nom, prenom = :prenom, dateNaissance = :dateNaissance, numeroTel = :numeroTel, email = :email WHERE id = :id ");
        $query->bindParam(":nom", $contact->nom);
        $query->bindParam(":prenom", $contact->prenom);
        $query->bindParam(":dateNaissance", $contact->dateNaissance);
        $query->bindParam(":numeroTel", $contact->numeroTel);
        $query->bindParam(":email", $contact->email);
        $query->bindParam(":id", $id);
        $query->execute();
    }
}

