<?php
namespace domain;

class User
{
    public $id_user;
    public $username;
    public $password;

    public function __construct($username, $password)
    {

        $this->username = $username;
        $this->password = $password;
        
    }
}

