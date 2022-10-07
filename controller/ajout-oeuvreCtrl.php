<?php

require_once 'model/Authors.php';
require_once 'model/Director.php';
require_once 'model/Book_store.php';
require_once 'model/Movie_Store.php';
require_once 'model/Comparaison.php';

$errors = [];
$success = false;

$author = new Authors();
$director = new Director();
$bookStore = new Book_store();
$movieStore = new Movie_store();
$comparaison = new Comparaison();


//Vérification de l'envoi du formulaire
if (isset($_POST['envoyer'])) {
    //Vérification des champs de donnée pour la table auteur
    if ((isset($_FILES['book_cover']['tmp_name'])) && (!empty($_FILES['book_cover']['tmp_name']))) {
        $imageType = exif_imagetype($_FILES['book_cover']['tmp_name']);
        $image_book = $_FILES['book_cover'];
        // IMAGETYPE_JPEG (2) IMAGETYPE_PNG (3) IMAGETYPE_WEBP (18) 
        switch (true) {
            case (($imageType === 2)):
                $author->book_cover = $author->convertImage3($image_book);
                break;
            case ($imageType === 3):
                $author->book_cover = $author->convertImage3($image_book);
                break;
            case (($imageType === 18)):
                $author->book_cover = $author->convertImage3($image_book);
                break;
            case (empty($image)):
                $errors[] = 'Merci d\'inserer une image de la couverture du livre';
        }
    }
    
    if (empty($_POST['author_firstname'])) {
        $errors[] = "Merci de renseigner le prenom de l'auteur";
    } else {
        $author->firstname = htmlspecialchars($_POST['author_firstname']);
    }
    if (empty($_POST['author_lastname'])) {
        $errors[] = "Merci de renseigner le nom de l'auteur";
    } else {
        $author->lastname = htmlspecialchars($_POST['author_lastname']);
    }
    if (empty($_POST['book_name'])) {
        $errors[] = "Merci de rensigner le titre du livre";
    } else {
        $author->book_title = htmlspecialchars($_POST['book_name']);
    }

    if (empty($_POST['book_publicationDate'])) {
        $errors[] = "Merci de renseigner la date de sortie du livre";
    } else {
        $author->release_year = $_POST['book_publicationDate'];
    }
    if (empty($_POST['book_page'])) {
        $errors[] = "Merci de renseigner le nombre de page constituant le livre";
    } else {
        $author->book_number_of_page = htmlspecialchars($_POST['book_page']);
    }if (empty($errors)) {

        $author_id = $author->createAuthor();}

       




    //Vérification des champs de donnée pour la table des commerce de livre
    if (empty($_POST['store_name_book'])) {
        $errors[] = "Merci de renseigner le nom du commerce qui vend ce livre";
    } else {
        foreach (($_POST['store_name_book']) as $store) {
            $store_name[] = htmlspecialchars($store);
        }
        $bookStore->store_name = $store_name;
    }

    if (empty($_POST['store_link_book'])) {
        $errors[] = "Merci de mettre le lien du site de commerce qui vend ce livre";
    } else {
        foreach (($_POST['store_link_book']) as $storeLink) {
            $store_link[] = htmlspecialchars($storeLink);
        }
        $bookStore->store_url = $store_link;
    }
    if (empty($errors)) {
        
        $bookStore->id_book = $author_id;
        $bookStore->createStoreBook();}

        

    //Vérification des champs de donnée pour la table réalisateur

    if ((isset($_FILES['movie_cover']['tmp_name'])) && (!empty($_FILES['movie_cover']['tmp_name']))) {
        $imageType = exif_imagetype($_FILES['movie_cover']['tmp_name']);
        $image_movie = $_FILES['movie_cover'];
        // IMAGETYPE_JPEG (2) IMAGETYPE_PNG (3) IMAGETYPE_WEBP (18) 
        switch (true) {
            case (($imageType === 2)):
                $director->movie_cover = $director->convertImage3($image_movie);
                break;
            case ($imageType === 3):
                $director->movie_cover = $director->convertImage3($image_movie);
                break;
            case (($imageType === 18)):
                $director->movie_cover = $director->convertImage3($image_movie);
                break;
            case (empty($image)):
                $errors[] = 'Merci d\'inserer une image de la couverture du film';
        }
    }
    if (empty($_POST['movie_name'])) {
        $errors[] = "Merci de renseigner le titre du film";
    } else {
        $director->movie_title = htmlspecialchars(($_POST['movie_name']));
    }

    if (empty($_POST['director_firstname'])) {
        $errors[] = "Merci de renseigner le prénom du realisateur";
    } else {
        $director->firstname = htmlspecialchars(($_POST['director_firstname']));
    }

    if (empty($_POST['director_lastname'])) {
        $errors[] = "Merci de renseigner le nom du réalisateur";
    } else {
        $director->lastname = htmlspecialchars(($_POST['director_lastname']));
    }
    if (empty($_POST['movie_publicationDate'])) {
        $errors[] = "Merci de renseigner la date de sortie du film";
    } else {
        $director->release_year = htmlspecialchars(($_POST['movie_publicationDate']));
    }

    if (empty($_POST['movie_duration'])) {
        $errors[] = "Merci de renseigner la durée du film";
    } else {
        $director->movie_duration = htmlspecialchars(($_POST['movie_duration']));
    }


if (empty($errors)) {

    
    $director_id = $director->createDirector();}

    //Vérification des champs de donnée pour la table des commerce de film
    if (empty($_POST['store_name_movie'])) {
        $errors[] = "Merci de renseigner le nom du commerce qui vend ce film";
    } else {
        foreach (($_POST['store_name_movie']) as $storeNameMovie) {
            $store_name_Movie[] = htmlspecialchars($storeNameMovie);
        }
        $movieStore->store_name = $store_name_Movie;
    }

    if (empty($_POST['store_link_movie'])) {
        $errors[] = "Merci de mettre le lien du site de commerce qui vend ce film";
    } else {
        foreach (($_POST['store_link_movie']) as $storeLinkMovie) {
            $store_link_movie[] = htmlspecialchars($storeLinkMovie);
        }
        $movieStore->store_url = $store_link_movie;
    }

    if (empty($errors)) {
        $movieStore->id_movie = $director_id;
          $movieStore->createStoremovie();}

    //Vérification des champs de donnée pour la comparaison
    if (empty($_POST['class_container'])) {
        $errors[] = "Merci de renseigner le type de scène";
    } else {
        foreach (($_POST['class_container']) as $classContainer) {
            $class_container[] = htmlspecialchars($classContainer);
        }

        $comparaison->class_container = $class_container;
    }
    if (empty($_POST['time_container'])) {
        $errors[] = "Merci de renseigner la scène";
    } else {
        foreach (($_POST['time_container']) as $timeContainer) {
            $time_container[] = htmlspecialchars($timeContainer);
        }
        $comparaison->timeline_container = $time_container;
    }


    if (empty($_POST['time_landmark'])) {
        $errors[] = "Merci de renseigner le repére du temps pour la comparaison";
    } else {
        foreach (($_POST['time_landmark']) as $timeLandmark) {
            $time_Landmark[] = htmlspecialchars($timeLandmark);
        }

        $comparaison->time_landmark = $time_Landmark;
    }

    if (empty($errors)) {

        
        
        
        $comparaison->id_book = $author_id;
        $comparaison->id_movie = $director_id;
        $comparaison->createComparaison();
        $success = true;
    }
}
