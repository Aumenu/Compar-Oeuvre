<?php

use LDAP\Result;

class Users extends Db
{
    public int $id;
    public string $pseudonyme;
    public string $password;
    public string $mail;
    public int $role;
    public array $error;

    /** Setter for the private password property
     * 
     * @access public 
     * */
    public function setPassword(string $password) : void {
        $this->password = $password;
    }


    public function createUser()
    {
        $query = 'INSERT INTO `user` (`pseudonyme`, `password`, `email`, `role`) VALUES 
        (:pseudonyme, :password, :mail, :role)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':pseudonyme', $this->pseudonyme, PDO::PARAM_STR);
        $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindParam(':mail', $this->mail, PDO::PARAM_STR);
        $stmt->bindParam(':role', $this->role, PDO::PARAM_INT);
        $stmt->execute();

        
    }

  /** Verifies if a user with the same username already exists in the database
     * 
     * @return bool true if an existing user is found, false otherwise
     * @access public 
     * */
    public function exists() : bool {
        $query = "SELECT id FROM user WHERE pseudonyme = :pseudonyme";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":pseudonyme", $this->pseudonyme, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $stmt->fetch();

        if($result == false) {
            return false;
        }
        return true;
    

}

/** Tests the username and password to verify if he is registered in our database.
     * 
     * @return bool true if connection successful, false otherwise
     * @access public 
     * */
    public function connection() : bool {
        $query = "SELECT * FROM user WHERE pseudonyme = :pseudonyme";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":pseudonyme", $this->pseudonyme, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Users');
        $result = $stmt->fetch();

        if($result == false) {
            return false;
        }
        return password_verify($this->password, $result->password);
    }

    public function userByPseudonyme() {
        $query = "SELECT * FROM user WHERE pseudonyme = :pseudonyme";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":pseudonyme", $this->pseudonyme, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Users');
        $result = $stmt->fetch();
        return $result;

    }




    public function modifyPassword() {
        $query = 'UPDATE `user` SET `password` = :password WHERE `id`= :id';
        $stmt = $this->pdo->prepare($query);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password", $this->password, PDO::PARAM_STR);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
    } 

}
