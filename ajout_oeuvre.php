<?php

require 'commun/header.php';
require_once 'model/Db.php';
require_once 'controller/ajout-oeuvreCtrl.php';
if (empty($_SESSION['pseudonyme'])){ 
    header('Location: inscription.php');
    }

?>
<main>
<h2 class="my_compte_title">Ajout d'une oeuvre</h2>
<?php if (!empty($errors)) {
    foreach ($errors as $error) { ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php }
} else if ($success) { ?>
    <div class="alert alert-success">Votre comparaison d'oeuvre à bien été crée ! merci de votre participation ! </div>
<?php }
?>

<h3 id="titre_ajout_oeuvre">Presentation livre</h3>
<form class ="ajout-oeuvre" method="POST" action="ajout_oeuvre.php" enctype="multipart/form-data">
    <div id="book-presentation">

        <label for="book_cover">Choissisez la couverture du livre : </label>
        <input type="file" name="book_cover" accept=".png, .jpeg, .webp, .jpg">
    </div>
    <div>
        <label for="book_name">Nom du livre : </label>
        <input type="text" name="book_name">
    </div>
    <div>
        <label for="author_firstname">Prenom du l'auteur : </label>
        <input type="text" name="author_firstname">
    </div>
    <div>
        <label for="author_lastname">Nom de l'auteur :</label>
            <input type="text" name="author_lastname">
    </div>
    <div>
        <label for="book_publicationDate">Date de publication du livre :</label>
            <input type="date" name="book_publicationDate">
    </div>
    <div>
        <label for="book_page">Nombre de page :</label>
        <input type="number" name="book_page">
    </div>
    <div id="store_list_book">
        <label for="store_link">Lien vers site de commerce :</label>
        <input type="text" name="store_name_book[]" placeholder="ex : Fnac">
        <input type="url" name="store_link_book[]" placeholder="https//lafnac.com">
        <button type="button" onclick="createInputBook()">+</button> <button type="button" onclick="deleteInputBook()">-</button>
    </div>

    <div class="split"></div>

    <h3>Presentation film</h3>
    <label for="movie_cover">Choissisez la couverture du film : </label>
    <input type="file" name="movie_cover" id="movie_cover" accept=".png, .jpeg, .webp, .jpg">
    </div>
    <div>
        <label for="movie_name">Nom du film : </label>
        <input type="text" name="movie_name" id="movie_name">
    </div>
    <div>
        <label for="director_firstname">Prenom du realisateur : </label>
        <input type="text" name="director_firstname" id="director_firstname">
    </div>
    <div>
        <label for="director_lastname">Nom du réalisateur :</label>
        <input type="text" id="director_lastname" name="director_lastname">
    </div>
    <div>
        <label for="movie_publicationDate">Date de sortie du film :</label>
            <input type="date" id="movie_publicationDate" name="movie_publicationDate">
    </div>
    <div>
        <label for="movie_duration">durée du film :</label>
        <input type="time" name="movie_duration" id="movie_duration" min="01:00" max="05:00" required>
    </div>
    <div id="store_list_movie">
        <label for="store_link">Lien vers site de commerce :</label>
        <input type="text" name="store_name_movie[]" placeholder="ex : Fnac">
        <input type="url" name="store_link_movie[]" placeholder="https//lafnac.com">
        <button type="button" onclick="createInputMovie()">+</button> <button type="button" onclick="deleteInputMovie()">-</button>
    </div>

    <div class="split"></div>
    
    <button type="button" onclick="createComponentsTimeLine()">ajout d'une bulle de timeline</button>
    <button type="button" onclick="deleteComponentTimeLine()">suppression de la dernière bulle de timeline</button>

        <div id="timeline_content"></div>



        <input type="submit" value="Envoyer" name="envoyer" />
</form>
</main>
<?php require_once 'commun/footer.php'; ?>