<?php
session_start();

// Vérification des informations de connexion
if($_POST['nom_utilisateur'] == "idriss" && $_POST['mot_de_passe'] == "1234"){
    $_SESSION['nom_utilisateur'] = $_POST['nom_utilisateur'];
    header("Location: enregistrer.php");
} else {
    $erreur = "Nom d'utilisateur ou mot de passe incorrect";
    header("Location: connexion.php?erreur=".urlencode($erreur));
}
?>
