<?php

session_start();

$mysqli = new mysqli('localhost', 'root', 'root', 'rdc') or die(mysqli_error($mysqli));

//Initialisation des champs
$idmaraude = 0;
$update = false;
$date = '';
$jour = '';
$arrondissement = '';
$adresse = '';
$beneficiaire = '';
$couple = '';
$famille = '';
$duvet = '';
$hygiene = '';
$textile = '';
$parka = '';
$remarque = '';
$revoir = '';
$appel = '';
$commentaire = '';

//Retour à la ligne
function eschtml($str){
    return str_replace("line_break_space", "<br />", htmlentities(str_replace(array("\r\n", "\n", "\'", "\r"), 'line_break_space', $str)));
}

//Fonction d'ajout de lignes
    if(isset($_POST['btnAjout'])){
        $date = $_POST['date'];
        $jour = $_POST['jour'];
        $arrondissement = $_POST['arrondissement'];
        $adresse = $_POST['adresse'];
        $beneficiaire = $_POST['beneficiaire'];
        $couple = $_POST['couple'];
        $famille = $_POST['famille'];
        $duvet = $_POST['duvet'];
        $hygiene = $_POST['hygiene'];
        $textile = $_POST['textile'];
        $parka = $_POST['parka'];
        $remarque = $_POST['remarque'];
        $revoir = $_POST['revoir'];
        $appel = $_POST['appel'];
        $commentaire = $_POST['commentaire'];

       !(!$mysqli->query("INSERT INTO maraude(date, jour, arrondissement, adresse, beneficiaire, couple, famille, duvet,
        hygiene, textile, parka, remarque, revoir, appel, commentaire) VALUES ('$date', '$jour', '$arrondissement', '$adresse', 
        '$beneficiaire', '$couple', '$famille', '$duvet', '$hygiene', '$textile', '$parka', '$remarque', '$revoir', '$appel', '$commentaire')") and !die($mysqli->error));

        $_SESSION['message'] = "Votre ligne a été sauvegardé !";
        $_SESSION['msg_type'] = "success";

        header("location: index.php");

    }

//Fonction de suppression de lignes
if(isset($_GET['deleteBtn'])){
        echo "<script>alert('Your message Here');</script>";
        $idmaraude = $_GET['deleteBtn'];

        $mysqli->query("DELETE FROM maraude WHERE idmaraude=$idmaraude") or die($mysqli->error);

        $_SESSION['message'] = "Votre ligne a été supprimé !";
        $_SESSION['msg_type'] = "danger";

        header("location: index.php");

    }

//Fonction de modification de lignes
if(isset($_GET['editBtn'])){
    $idmaraude = $_GET['editBtn'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM maraude WHERE idmaraude=$idmaraude") or die($mysqli->error);
    if (count($result)==1){
        $row = $result->fetch_array();
        $date = $row['date'];
        $jour = $row['jour'];
        $arrondissement = $row['arrondissement'];
        $adresse = $row['adresse'];
        $beneficiaire = $row['beneficiaire'];
        $couple = $_POST['couple'];
        $famille = $_POST['famille'];
        $duvet = $_POST['duvet'];
        $hygiene = $_POST['hygiene'];
        $textile = $_POST['textile'];
        $parka = $_POST['parka'];
        $remarque = $_POST['remarque'];
        $revoir = $_POST['revoir'];
        $appel = $_POST['appel'];
        $commentaire = $_POST['commentaire'];
    }
}

//Enregistrement des champs modifiés
if(isset($_POST['saveBtn'])){
    $idmaraude = $_POST['idmaraude'];
    $date = $_POST['date'];
    $jour = $_POST['jour'];
    $arrondissement = $_POST['arrondissement'];
    $adresse = $_POST['adresse'];
    $beneficiaire = $_POST['beneficiaire'];
    $couple = $_POST['couple'];
    $famille = $_POST['famille'];
    $duvet = $_POST['duvet'];
    $hygiene = $_POST['hygiene'];
    $textile = $_POST['textile'];
    $parka = $_POST['parka'];
    $remarque = $_POST['remarque'];
    $revoir = $_POST['revoir'];
    $appel = $_POST['appel'];
    $commentaire = $_POST['commentaire'];

    $mysqli->query("UPDATE maraude SET date='$date', jour='$jour', arrondissement='$arrondissement', adresse='$adresse', 
    beneficiaire='$beneficiaire' , couple='$couple', famille='$famille', duvet='$duvet', hygiene='$hygiene', textile='$textile', parka='$parka', 
    remarque='$remarque', revoir='$revoir', appel='$appel', commentaire='$commentaire' WHERE idmaraude=$idmaraude") or die($mysqli->error);

    $_SESSION['message'] = "Votre ligne a été modifié !";
    $_SESSION['msg_type'] = "warning";

    header("location: index.php");


}