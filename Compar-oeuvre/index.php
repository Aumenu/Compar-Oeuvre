<?php

require 'commun/header.php';

?>

<main>
  <div class="text_body_index">
    <h2 class="text_body_name">Presentation</h2>
    <p>Bonjour et bienvenue sur Compar'Oeuvre !<br>
      Sur ce site vous pourrez voir les différences entre un livre et sa version cinématographique.<br> Vous pouvez également contribuer à l'ajout de nouveau contenu en vous inscrivant via l'onglet "Mon compte" ! <br>
    Nous vous tiendrons également des futures nouvelles fonctionnalités du site sur cette page.</p>
  </div>
  <div class="my-carousel">
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="img/carousel/JP-film.jpg" class="carousel-image" alt="jurassic-park">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/carousel/harry-potter-1-livre.jpg" class="carousel-image" alt="harry-potter">
    </div>
    <div class="carousel-item">
      <img src="img/carousel/livre-et-film.jpg" class="carousel-image" alt="livre et film">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</main>

<?php require_once 'commun/footer.php'; ?>