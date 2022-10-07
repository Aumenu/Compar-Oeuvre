<?php 
require_once 'model/Authors.php';
require_once 'model/Director.php';


require_once 'model/Comparaison.php';

$errors = [];
$success = false;


$director = new Director();
$author = new Authors();


$filmlist = $director->directorList();

if ((isset($_GET['idDelete'])) && (is_numeric($_GET['idDelete']))){  
    $movieDelete = $director->directorDelete(($_GET['idDelete']));
    $bookDelete = $author->authorDelete(($_GET['idDelete']));

}
