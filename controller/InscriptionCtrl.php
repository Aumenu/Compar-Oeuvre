<?php

require 'model/Users.php';


$errors = [];
$success = false;

$user = new Users();

$pseudonyme = isset($_POST["pseudonyme"]) ? $_POST["pseudonyme"] : "";

// Vérification de l'envoi du formulaire
if(isset($_POST['inscription'])) {

    // Vérification du nom d'utilisateur
    if(empty($_POST['pseudonyme'])) {
        $errors[] = "Merci de renseigner un pseudonyme";
    }
    else if(strlen($_POST['pseudonyme']) > 25) {
        $errors[] = "Le pseudonyme doit contenir moins de 25 caractères";
    }
    else {
        $user->pseudonyme = htmlspecialchars($_POST['pseudonyme']);
    }

    // Vérification du mot de passe et de sa concordance avec le champ de vérification
    if(empty($_POST['password']) || empty($_POST['confirm_password'])) {
        $errors[] = "Merci de renseigner un mot de passe et de le confirmer";
    }
    else if($_POST['password'] != $_POST['confirm_password']) {
        $errors[] = "Le mot de passe et sa confirmation ne concordent pas";
    }
    else {
        $user->setPassword($_POST['password']);
    }

    if(empty($_POST['mail'])) {
        $errors[] = "Merci de renseigner une adresse mail";
    }
    else if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format d'adresse mail incorrect";
    }
    else {
        $user->mail = $_POST['mail'];
    }
    
    // Cet username est-il déjà pris ?
    if($user->exists()) {
        $errors[] = "Ce nom d'utilisateur est déjà pris";
    }

    if(empty($errors)) {
        // Appel de la méthode d'insertion du User
        $user->role = 0;
        $user->createUser();
        $success = true;
    }
  


}


?>