<?php

require 'commun/header.php';
require_once 'model/Db.php';
require 'model/Comparaison.php';
require 'controller/comparaisonCtrl.php';



      
?>
  <div class="text_body">
    <h2 class="text_body_name"><?php echo $film->movie_title ;?></h2>
  </div>
  <!--Bandeau d'information sur le livre et le film-->
  <div class="information_banner">
  <!--Présentation du livre-->
  <div class="book_presentation">
    <h3><?php echo $livre->book_title ;?></h3>
    <div class="book_cover">
      <img src="img/<?php echo $livre->book_cover ; ?>" alt="couverture du livre" />
    </div>
    <div class="book_information">
      <p class="author">Auteur : <?php echo $livre->firstname." ".$livre->lastname; ?></p>
      <p class="release_date">Date de sortie : <?php echo $livre->release_year; ?></p>
      <p class="number_of_pages">Nombre de pages : <?php echo $livre->book_number_of_page; ?></p>
      <p>Liste de site de commerce :</p>
      <ul class="link_to_shops">
      <?php foreach($bookstoreList as $bookstore) { ?>
        
      <li><a href="<?php echo $bookstore->store_url ;?>" target="_blank"><?php echo $bookstore->store_name ;?></a></li>
      <?php } ?>
      </ul>
      </div>
  </div>

  <!--permet de crée un espace entre les blocs d'information-->
  <div class="between_two"></div>

<!--Présentation du film-->
<div class="movie_presentation">
  <h3><?php echo $film->movie_title ;?></h3>
  <div class="movie_cover">
    <img src="img/<?php echo $film->movie_cover ; ?>" alt="couverture du film" />
  </div>
  <div class="movie_information">
    <p class="director">Réalisateur : <?php echo $film->firstname." ".$film->lastname; ?></p>
    <p class="release_date">Date de sortie : <?php echo $film->release_year; ?></p>
    <p class="duration_of_the_movie">Durée du film : <?php echo $film->movie_duration; ?></p>
    <p>Liste de site de commerce :</p>
      <ul class="link_to_shops">
      <?php foreach($moviestoreList as $moviestore) { ?>
        
      <li><a href="<?php echo $moviestore->store_url ;?>" target="_blank"><?php echo $moviestore->store_name ;?></a></li>
      <?php } ?>
      </ul>
  </div>
</div>
</div>

  <!--début de la Timeline-->
  <div class="container">
    <div class="timeline">
      <ul>
        <?php foreach ($comparaisonList as $comparaisonoeuvre) { ?>
        <li>
          <div class="timeline-content">
            <div class="<?php echo $comparaisonoeuvre->class_container ;?>">
            <h3 class="date"><?php echo $comparaisonoeuvre->time_landmark ;?></h3>
            <h1><?php if ($comparaisonoeuvre->class_container == "missing_from_book") 
            { echo "Scène absente dans le livre";
            }else if ($comparaisonoeuvre->class_container == "différence_book_and_movie") 
            { echo "Scène différente dans le livre et dans le film";
            }elseif  ($comparaisonoeuvre->class_container == "missing_from_movie") 
            { echo "Scène absente dans le film";
            }elseif  ($comparaisonoeuvre->class_container == "missing_from_movie_spoiler") 
            { echo "Scène absente dans le film avec spoiler";
            }elseif  ($comparaisonoeuvre->class_container == "missing_from_book_spoiler") 
            { echo "Scène absente dans le livre avec spoiler";
            }else  
            { echo "Scène différente dans le livre et dans le film avec spoiler";


            } ?></h1>
            <p><?php echo $comparaisonoeuvre->timeline_container ;?></p>
              </div>
          </div>
        </li>
        
        <?php } ?>
      </ul>
    </div>
  </div>
  <!--fin de la timeline-->