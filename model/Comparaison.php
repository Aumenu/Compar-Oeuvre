<?php

use LDAP\Result;

class Comparaison extends Db
{
    public int $id;
    public array $class_container;
    public array $timeline_container;
    public array $time_landmark;
    public int $id_book;
    public int $id_movie;

    public function createComparaison()
    {
        for ($i = 0; $i < (count($this->class_container)); $i++) {

            $query = 'INSERT INTO `comparaison` (`class_container`, `timeline_container`, `time_landmark`, `id_book`, `id_movie`) VALUES 
        (:class_container, :timeline_container, :time_landmark, :id_book, :id_movie )';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':class_container', $this->class_container[$i], PDO::PARAM_STR);
            $stmt->bindParam(':timeline_container', $this->timeline_container[$i], PDO::PARAM_STR);
            $stmt->bindParam(':time_landmark', $this->time_landmark[$i], PDO::PARAM_STR);
            $stmt->bindParam(':id_book', $this->id_book, PDO::PARAM_INT);
            $stmt->bindParam(':id_movie', $this->id_movie, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function listeComparaison()
    {
        $query = 'SELECT `class_container`, `timeline_container`, `time_landmark` ,`author`.`firstname` AS `authorName`, `author`.`lastname` AS `authorFamilyName`, `book_title`, `author`.`release_year` AS `dateBook`,`book_number_of_page`, `book_cover`, `director`.`lastname` AS `directorNameFamily`, `director`.`firstname` AS `directorName`, `director`.`release_year` AS `dateMovie`, `movie_title`, `movie_duration`, `movie_cover` FROM `comparaison` INNER JOIN `author` ON `comparaison`.`id_book` = `author`.`id` INNER JOIN `director` ON `comparaison`.`id_movie` = `director`.`id` WHERE `comparaison`.`id_book` = `author`.`id` AND `comparaison`.`id_movie` = `director`.`id` ';

        return $query;
    }

    public function storeListBook(){
    $query = 'SELECT `store_name`, `store_url` FROM `book_commerce` INNER JOIN `author` On `book_commerce`.`id_book`= `author`.`id` WHERE `id_book`= `author`.`id`';

    return $query;
}

public function storeListmovie(){
    $query = 'SELECT `store_name`, `store_url` FROM `movie_commerce` INNER JOIN `director` On `movie_commerce`.`id_movie`= `director`.`id` WHERE `movie_commerce`.`id_movie`= `director`.`id`';

    return $query;
}

public function comparaisonPage($id) {
    $query = 'SELECT `class_container`, `timeline_container`, `time_landmark`, `id_book`, `id_movie`  FROM `comparaison` WHERE `id_movie` = :id';
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
}
