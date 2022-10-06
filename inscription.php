<?php
require 'commun/header.php';
require_once 'model/Db.php';
require 'controller/InscriptionCtrl.php';

?>


    <div class="inscription_body">
    
        <div class="registration_form">
            <form class="registration" action="inscription.php" method="POST">
                <h2>Inscription</h2>
                <?php if (!empty($errors)) {
                    foreach ($errors as $error) { ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php }
                } else if ($success) { ?>
                    <div class="alert alert-success">votre inscription a bien été enregistré.</div>
                <?php }
                ?>
                <div class="data_field">
                    <label for="pseudonyme">Choisissez un nom d'utilisateur</label>
                    <input type="text" name="pseudonyme">
                </div>
                <div class="data_field">
                    <label for="password">Choisissez un mot de passe</label>
                    <input type="password" name="password">
                </div>
                <div class="data_field">
                    <label for="confirm_password">Confirmer le mot de passe</label>
                    <input type="password" name="confirm_password">
                </div>
                <div class="data_field">
                    <label for="mail">Votre adresse mail</label>
                    <input type="email" name="mail">
                </div>
                <div class="validation_form">
                    <input classe="button_validation" type="submit" name="inscription" value="Inscription">
                </div>
            </form>
        </div>
</div>



    </body>