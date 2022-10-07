<?php

require_once 'model/Users.php';

$errors = [];
$success = false;

$user = new Users();

$pseudonyme = isset($_POST["pseudonyme"]) ? $_POST["pseudonyme"] : "";

// Vérification de l'envoi du formulaire
if(isset($_POST['connexion'])) {

    // Vérification du nom d'utilisateur
    if(empty($_POST['pseudonyme'])) {
        $errors[] = "Merci de renseigner un pseudonyme";
    }
    else {
        $user->pseudonyme = htmlspecialchars($_POST['pseudonyme']);
    }

    // Vérification du mot de passe
    if(empty($_POST['password'])) {
        $errors[] = "Merci de renseigner un mot de passe";
    }
    else {
        $user->password = $_POST['password'];
    }

    if(empty($errors)) {
        // Vérification des données de l'utilisateur
        if(!$user->connection()) {
            $errors[] = "Les informations de connexion sont incorrectes";
        }
        else {
            $user = $user->userByPseudonyme();
            $_SESSION['id'] = $user->id;
            $_SESSION['pseudonyme'] = $user->pseudonyme;
            $_SESSION['role'] = $user->role;
            header('Location: mon-compte.php');
        }
        
    }

}


?>