 <?php
require_once 'model/Db.php';
require_once 'model/Comparaison.php';
require_once 'model/Authors.php';
require_once 'model/Director.php';
require_once 'model/Book_store.php';
require_once 'model/Movie_store.php';

$errors = [];
$director = new Director;
$comparaison = new Comparaison;
$author = new Authors;
$bookstore = new Book_store;
$moviestore = new Movie_store;

if (!isset($_GET['id'])) {
    $errors[] = "L'oeuvre  n'est pas renseigné";
} else if (!is_numeric($_GET['id'])) {
    $errors[] = "L'id de l'oeuvre doit être un entier numérique";
}
if (empty($errors)) {

$film = $director->directorId($_GET['id']);
$moviestoreList = $moviestore->directorMovieStore($film->id);
$comparaisonList = $comparaison->comparaisonPage($film->id);
$livre = $author->AuthorPage($comparaisonList[0]->id_book);
$bookstoreList = $bookstore-> directorbookStore($livre->id);
}

function changeDate(string $date, string $formatInput, string $formatOutput): string
{
    $d = DateTimeImmutable::createFromFormat($formatInput, $date);
    return $d->format($formatOutput);
}


  
    /*
if (isset($_GET['idDelete'])) {
    var_dump($_GET['idDelete']);
    $appointments->deleteAppointment(($_GET['idDeleteConfirmation']));
    header("Location: liste-rendezvous.php");
    */













/*
function comparaisonList()
{
    $comparaison = new Comparaison;
    $result[] = $comparaison->listeComparaison();
    $result[] .= $comparaison->storeListBook();
    $result[] .= $comparaison->storeListmovie();
    return $result;
}

$comparaisonList = comparaisonList();
*/




