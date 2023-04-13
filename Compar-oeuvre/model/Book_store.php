<?php

use LDAP\Result;

class Book_store extends Db
{
    public int $id;
    public array $store_name;
    public array $store_url;
    public int $id_book;


    public function createStoreBook()
    {
        
        for ($i = 0; $i < (count($this->store_name)); $i++) {



            $query = 'INSERT INTO `book_commerce` (`store_name`, `store_url`, `id_book`) VALUES 
        (:store_name, :store_url, :id_book)';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':store_name', $this->store_name[$i], PDO::PARAM_STR);
            $stmt->bindParam(':store_url', $this->store_url[$i], PDO::PARAM_STR);
            $stmt->bindParam(':id_book', $this->id_book, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function directorbookStore($id) {
        $query = 'SELECT `store_name`, `store_url`, `id_book`  FROM `book_commerce` WHERE `id_book` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
