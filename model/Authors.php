<?php

use LDAP\Result;

class Authors extends Db
{
    public int $id;
    public string $firstname;
    public string $lastname;
    public string $book_title;
    public string $release_year;
    public int $book_number_of_page;
    public string $book_cover;

   

    public function createAuthor()
    {
        $query = 'INSERT INTO `author` (`firstname`, `lastname`, `book_title`, `release_year`, `book_number_of_page`, `book_cover`) VALUES 
        (:firstname, :lastname, :book_title, :release_year, :book_number_of_page, :book_cover )';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindParam(':book_title', $this->book_title, PDO::PARAM_STR);
        $stmt->bindParam(':release_year', $this->release_year, PDO::PARAM_STR);
        $stmt->bindParam(':book_number_of_page', $this->book_number_of_page, PDO::PARAM_INT);
        $stmt->bindParam(':book_cover', $this->book_cover,PDO::PARAM_STR);
        $stmt->execute();
        $id = $this->pdo->lastInsertId();
        return $id;
    }

    public function displayPublicationDate() : string {
        $dateTime = DateTime::createFromFormat("Y-m-d", $this->release_year);
        return $dateTime->format("d/m/Y");
    }

   public function convertImage3($image)
{
    //https://lesdocs.fr/gestion-des-images-avec-php/
    $uploads_dir = 'img/';
    $tmp_name = $image['tmp_name'];
    $name = basename($image['name']);
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
    return $name;
}

public function AuthorPage($id) {
    $query = 'SELECT `firstname`, `lastname`, `book_title`, `release_year`, `book_number_of_page`, `book_cover`, `id` FROM `author` WHERE `id` = :id';
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
}

public function authorDelete($id) {
    $query = 'DELETE FROM `author` WHERE `id`=:id';
    $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
}
}