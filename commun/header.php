<?php
session_start();
$site= $_SERVER['REQUEST_URI'];
$page= substr( $site, 29 );
$oeuvre = ["Jurassic-Park.php", "Eragon.php", "Harry-Potter.php"];
$userCompte= ["connexion.php","inscription.php" ];





?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compar'oeuvre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
  <body class="back_plane">
    <div class="leading">
    <h1 class="siteName">Compar'Oeuvre</h1>
    </div>
    <!-- début de la barre de navigation-->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="<?php if($page=="accueil.php"){echo "nav-link active";} else {echo "nav-link";} ?>" aria-current="page" href="accueil.php">Accueil</a>
            </li>
            <li class="nav-item dropdown">
              <a class="<?php if (in_array($page, $oeuvre, $page==$oeuvre)){echo "nav-link active dropdown-toggle";} else {echo "nav-link dropdown-toggle";} ?>" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Film et livre</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="Harry-Potter.php">Harry-Potter</a></li>
                <li><a class="dropdown-item" href="Jurassic-Park.php">Jurassic-Park</a></li>
                <li><a class="dropdown-item" href="Eragon.php">Eragon</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item disabled " href="#">à venir</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="<?php if($page=="contact.php"){echo "nav-link active";} else {echo "nav-link";} ?>" href="contact.php">Contact</a>
            </li>      
            <li class="nav-item dropdown">
              <a class="<?php if (in_array($page, $userCompte, $page==$userCompte)){echo "nav-link active dropdown-toggle";} else {echo "nav-link dropdown-toggle";} ?>" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Mon compte</a>
              <ul class="dropdown-menu">
                <?php if (empty($_SESSION['pseudonyme'])) { 
                 echo "<li><a class=\"dropdown-item\" href=\"connexion.php\">Connexion</a></li>" ; 
               } else { 
                echo "<li><a class=\"dropdown-item\" href=\"mon-compte.php\">Mon compte</a></li>" ;} ?>
                <?php if (empty($_SESSION['pseudonyme'])) { 
                 echo "<li><a class=\"dropdown-item\" href=\"inscription.php\">Inscription</a></li>" ;}
                 else { echo "<li><a class=\"dropdown-item\" href=\"deconnexion.php\">Deconnexion</a></li>",
                  "<li><a class=\"dropdown-item\" href=\"inscription.php\">Inscription</a></li>" ;

                 } ?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>