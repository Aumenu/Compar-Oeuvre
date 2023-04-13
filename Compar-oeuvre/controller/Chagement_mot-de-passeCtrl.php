<?php
require_once 'model/Users.php';


$errors = [];
$success = false;

$user = new Users();
$id = $_SESSION['id'];

if (isset($_POST['confirmation'])) {
    if ($_POST['new_password'] != $_POST['confirm_password']) {
        $errors[] = "Le nouveau mot de passe et sa confirmation ne concordent pas";
    } else if (empty($_POST['new_password']) || empty($_POST['confirm_password'])) {
        $errors[] = "Merci de renseigner un  nouveau mot de passe et de le confirmer";
    }
    $user->password = $_POST['old_password'];
    $user->pseudonyme = $_SESSION['pseudonyme'];
    if (empty($_POST['old_password'])) {
        $errors[] = "Merci de renseigner le mot de passe actuel";
    } else if (!$user->connection()) {
        $errors[] = "Le mot de passe actuelle est incorrect ";
    }
    if (empty($errors)) {
        $user->id = $id;
        $user->password = $_POST['new_password'];
        $user->modifyPassword();
        $success = true;
    }
}
