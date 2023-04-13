<?php

use LDAP\Result;

class Movie_store extends Db
{
    public int $id;
    public array $store_name;
    public array $store_url;
    public int $id_movie;

    public function createStoremovie()
    {
        for ($i = 0; $i < (count($this->store_name)); $i++) {

            $query = 'INSERT INTO `movie_commerce` (`store_name`, `store_url`, `id_movie`) VALUES 
        (:store_name, :store_url, :id_movie)';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':store_name', $this->store_name[$i], PDO::PARAM_STR);
            $stmt->bindParam(':store_url', $this->store_url[$i], PDO::PARAM_STR);
            $stmt->bindParam(':id_movie', $this->id_movie, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function directorMovieStore($id) {
        $query = 'SELECT `store_name`, `store_url`, `id_movie`  FROM `movie_commerce` WHERE `id_movie` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
