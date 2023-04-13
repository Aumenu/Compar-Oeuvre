<?php
require 'commun/header.php';
if (empty($_SESSION['pseudonyme'])){ 
header('Location: inscription.php');
}

require_once 'controller/AdminCtrl.php';
?>
<main>
<h2 class="my_compte_title">Mon compte</h2>
<?php if ($_SESSION['role']==1) { ?>
    
   
 <table class="admin_table">
    <thead>
        <tr>
            <th colspan="2">Liste des oeuvres</th>
        </tr>
    </thead>
    <tbody>
         <?php foreach ($filmlist as $oeuvre) {?>
        <tr>
            <td><?php echo $oeuvre->movie_title ?></td>
            <td><a href="mon-compte.php?idDelete=<?= $oeuvre->id ?>">Supprimer</a></li>
        </tr>
        <?php } ?>
    </tbody>
 </table>
<?php }?>
<div class="div_user_compte">
<button class="user_compte"><a href="changement_mot-de-passe.php">Changer mon mot de passe</a></button>
<button class="user_compte"><a href="ajout_oeuvre.php"> Ajouter une oeuvre </a></button>
</div>
</main>
<?php require_once 'commun/footer.php'; ?>