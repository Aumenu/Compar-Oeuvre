<?php

class Db {
    protected PDO $pdo;

    /**
     * Permet la connexion à la BDD
     */
    public function __construct()
    {
        try {
            /** @var PDO $pdo  
             * Instance de l'objet PDO
             */
            /*mode serveur local*/
            $this->pdo = new PDO('mysql:host=localhost;dbname=compar-oeuvre;charset=utf8', 'root');
            
            /*mode serveur internet
            $this->pdo = new PDO('mysql:host=localhost;dbname=aqevfkan_compar-oeuvre
            ;charset=utf8','MVWZNiSm4vhDdo5RttMc', 'aqevfkan_Blackirex');
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            */

            /**
             * PDO::ATTR_ERRMODE et PDO::ERRMODE_EXCEPTION permettent de spécifier à PDO que l'on veux des Exceptions à la place des erreurs PHP. Cela va permettre de les attraper dans le catch.
             */
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            die('Erreur : ' . $error->getMessage());
        }
    }

    /**
     * Cette methode est protected. Elle ne peut être appelé que dans la classe et ses enfants. Elle permet d'executer la requête SQL et de retourner le jeu de résultats.
     *
     * @param [type] $query
     * @return array
     */
    protected function getQueryResult($query): array
    {
        /**
         * $queryResult devient une instance de l'objet PCOStatement
         * $pdo->query() execute la requête SQL
         */
        $queryResult = $this->pdo->query($query);
        /**
         * Le fetchAll permet de récupérer un tableau avec les valeurs de la BDD
         * Le paramètre PDO::FETCH_OBJ permet de spécifier que le tableau de retour doit contenir un objet avec des attributs correspondant aux champs de la BDD.
         */
        $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}