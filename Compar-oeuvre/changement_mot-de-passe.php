<?php
require_once 'commun/header.php';
require 'controller/Chagement_mot-de-passeCtrl.php'

?>
<main>
<div class="inscription_body">
    
    <div class="registration_form">
        <form class="registration" action="changement_mot-de-passe.php" method="POST">
            <h2>Changement de mot passe</h2>
            <?php if (!empty($errors)) {
                foreach ($errors as $error) { ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php }
            } else if ($success) { ?>
                <div class="alert alert-success">votre mot de passe à bien était modifier.</div>
            <?php }
            ?>
            <div class="data_field">
                <label for="old_password">Votre mot de passe actuel</label>
                <input type="password" name="old_password">
            </div>
            <div class="data_field">
                <label for="old_password">Votre nouveau mot de passe</label>
                <input type="password" name="new_password">
            <div class="data_field">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" name="confirm_password">
           
                <div class="validation_form_password">
                <input classe="button_validation" type="submit" name="confirmation" value="Confirmation">
            </div>
        </form>
    </div>
</div>
</main>
<?php require_once 'commun/footer.php'; ?>


