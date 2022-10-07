<?php

require 'commun/header.php';
require_once 'model/Db.php';
require 'controller/ConnexionCtrl.php';

?>
<main>
<div class="connexion_form">
    
        <?php if (!empty($errors)) {
            foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?= $error ?></div>
        <?php }
        } ?>
<main class="container mt-3">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-warning"><?= $_SESSION['message'] ?></div>
        <?php } ?>

        <form action="connexion.php" method="POST">
            <h2>Connexion</h2>

            <div class="data_field">
                <label for="pseudonyme">Pseudonyme</label>
                <input type="text" name="pseudonyme">
            </div>
            <div class="data_field">
                <label for="password">Mot de passe</label>
                <input type="password" name="password">
            </div>

            <div class="validation_form">
                <input classe="button_validation" type="submit" name="connexion" value="Connexion">
            </div>
</div>
</form>
</div>
</div>
</main>
<?php require_once 'commun/footer.php'; ?>