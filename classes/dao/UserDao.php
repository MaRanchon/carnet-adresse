<?php 
namespace dao;

use domain\User;
include 'includes/autoload.inc';

class UserDao extends DaoBase
{

    public function __construct($config)
    {
        parent::__construct($config);
    }
        
    public function findAllUsers() {
        $result = [];
        
        $reponse = $this->bdd->query("SELECT username, password, id FROM users ORDER BY id;");
        
        while ($donnees = $reponse->fetch()) {
            $username = $donnees["username"];
            $password = $donnees['password'];
            
            $user = new User($username, $password);
            $user->id_user = $donnees["id"];
            
            $result[] = $user;
        }
        
        return $result;
    }
    
    public function findUserById($id) {
        $result = "";
        
        $query = $this->bdd->prepare("SELECT username, password FROM users WHERE id = :id;");
        $query->bindParam(":id", $id);
        
        if($query->execute()) {
            if ($donnees = $query->fetch()) {
                $username = $donnees["username"];
                $password = $donnees["password"];
                $result = new User($username, $password);
            }
        }
        return $result;
    }
    
    public function insertUser($user) {
        
        $query = $this->bdd->prepare("INSERT INTO users (username, password) VALUES (:username, :password);");
        $query->bindParam(":username", $user->username);
        $query->bindParam(":password", $user->password);
        
        $query->execute();
    }
    
    public function deleteUser($id) {
        $query = $this->bdd->prepare("DELETE FROM users WHERE id = :id;");
        $query->bindParam(":id", $id);
        $query->execute();
        
    }
    
    public function updateUser($user, $id) {
        $query = $this->bdd->prepare("UPDATE users SET username = :username, password = :password WHERE id = :id;");
        $query->bindParam(":id", $id);
        $query->bindParam(":username", $user->username);
        $query->bindParam(":password", $user->password);
        $query->execute();
    }
}

