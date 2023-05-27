<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'forecdb';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn){
    die('Erreur de connexion: '. mysqli_error());
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$faculte = $_POST['faculte'];
$promotion = $_POST['promotion'];
$telephone = $_POST['telephone'];
$jour = $_POST['jour'];

$result = mysqli_query($conn,"SELECT COUNT(*) FROM identification WHERE nom='$nom' AND prenom='$prenom'");
$row = mysqli_fetch_row($result);
if ($row[0] > 2) {
    echo "Cette personne doit etre sanctionnée sur le champ.";
    if(isset($_POST['ok'])){
        mysqli_query($conn, "DELETE FROM identification WHERE nom='$nom' AND penom='$prenom'");
        mysqli_query($conn, "INSERT INTO saction (nom, prenom, sexe, faculte, promotion, telephone, jour) VALUES ('$nom','$prenom','$sexe','$faculte','$promotion','$telephone','$jour')");
    }else{
        echo"<form method='post'><input type='submit' name='ok' value='OK'></form>";
    }
}else{
    mysqli_query($conn,"INSERT INTO identification (nom, prenom, sexe, faculte, promotion, telephone, jour) VALUES ('$nom','$prenom','$sexe','$faculte','$promotion','$telephone','$jour')");
    echo"L'étudiant a été enregistré avec succès.";
}
mysqli_close($conn);
?>