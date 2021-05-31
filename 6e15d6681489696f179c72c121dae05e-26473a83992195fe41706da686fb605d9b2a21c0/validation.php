<?php
session_start();

$regex = "/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/";

$errors = array();

if (!array_key_exists('name', $_POST) || $_POST['name'] == '') {// on verifie l'existence du champ et d'un contenu
    $errors ['name'] = "vous n'avez pas renseigné votre nom";
}


if (!array_key_exists('email', $_POST) || $_POST['email'] == '' ) {// on verifie existence de la clé
    $errors ['mail'] = "vous n'avez pas renseigné votre email";
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {// on verifie existence de la clé
    $errors ['mail'] = "vous email n'est pas valide";
}

if (!array_key_exists('phone', $_POST) || $_POST['phone'] == ''  ) {// on verifie existence de la clé
    $errors ['phone'] = "vous n'avez pas renseigné votre n° de téléphone";
}

if (!preg_match('/^0\d(\s|-)?(\d{2}(\s|-)?){4}$/',$_POST['phone']) ) {// on verifie existence de la clé
    $errors ['phone'] = "vous n° de téléphone n'est pas valide";
}


if ($_POST['topic'] == 'choose') {
    $errors ['topic'] = "vous n'avez pas renseigné la thématique";

}if (!array_key_exists('message', $_POST) || $_POST['message'] == '') {
    $errors ['message'] = "vous n'avez pas renseigné votre message";
}
//On check les infos transmises lors de la validation
if (!empty($errors)) { // si erreur on renvoie vers la page précédente
    $_SESSION['errors'] = $errors;//on stocke les erreurs
    $_SESSION['inputs'] = $_POST;
    header('Location: form.php');
} else {
    include "succes.php";

}
