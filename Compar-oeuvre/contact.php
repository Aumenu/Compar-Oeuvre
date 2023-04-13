<?php

require 'commun/header.php';
      
?>
<main>
      <form class="contact_form" method="post" action="contact.php">
        <h1>Contactez-nous</h1>
        <div class="split"></div>
        <div class="area_form_contact">
            <div class="area_form_left">
                <div class="pack_contact_left">
                    <div class="box">
                        <label>Votre prénom</label>
                        <input type="text" name="prenom" required>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="box">
                        <label>Votre adresse mail</label>
                        <input type="mail" name="email" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                </div>
            </div>
            <div class="area_form_right">
                <div class="box">
                    <label>Message</label>
                    <textarea name="message"></textarea>
                </div>
            </div>
        </div>
        <div class="foot_form_contact">
            <input type="submit" name="send_message" value="Envoyez le message">
        </div>
        </form>
        <!--function pour envoyer mail mais ne fonctionnent pas en localhost, necessite un serveur mail -->
        <?php 
        if (isset($_POST['message'])) {
            $retour = mail('comparoeuvre@gmail.com', 'Envoi depuis la page contact Compar\'oeuvre de la part de'. $_POST['prenom'], $_POST['message'], 'from: '.$_POST['email']. "\r\n". 'Reply-to '. $_POST['email']);
            if($retour)
            echo '<p>Votre message a bien été envoyé.</p>';
        }
        ?>
</main>
<?php require_once 'commun/footer.php'; ?>