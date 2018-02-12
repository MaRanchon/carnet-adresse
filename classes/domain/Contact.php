<?php
namespace domain;

class Contact
{
    public $id;
    public $id_user;
    public $nom;
    public $prenom;
    public $dateNaissance;
    public $numeroTel;
    public $email;

    public function __construct($nom, $prenom, $dateNaissance = null, $numeroTel = null, $email = null)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->numeroTel = $numeroTel;
        $this->email = $email;
    }
}

