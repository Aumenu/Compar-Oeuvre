<?php

use LDAP\Result;

class Director extends Db
{
    public int $id;
    public string $firstname;
    public string $lastname;
    public string $movie_title;
    public string $release_year;
    public string $movie_duration;
    public string $movie_cover;

   

    public function createDirector()
    {
        $query = 'INSERT INTO `director` (`firstname`, `lastname` ,`movie_title`, `release_year`, `movie_duration`, `movie_cover`) VALUES 
        (:firstname, :lastname, :movie_title, :release_year, :movie_duration, :movie_cover )';
       
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindParam(':movie_title', $this->movie_title, PDO::PARAM_STR);
        $stmt->bindParam(':release_year', $this->release_year, PDO::PARAM_STR);
        $stmt->bindParam(':movie_duration', $this->movie_duration, PDO::PARAM_STR);
        $stmt->bindParam(':movie_cover', $this->movie_cover, PDO::PARAM_STR);
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

public function directorId($id) {
    $query = 'SELECT `id`,`firstname`, `lastname`, `movie_title`, `release_year`, `movie_duration`, `movie_cover` FROM `director` WHERE `id` = :id';
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
}

public function directorList() {
    $query = 'SELECT `id`,`firstname`, `lastname`, `movie_title`, `release_year`, `movie_duration`, `movie_cover` FROM `director`';
    $stmt = $this->pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

public function directorDelete($id) {
    $query = 'DELETE FROM `director` WHERE `id`=:id';
    $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
}

}