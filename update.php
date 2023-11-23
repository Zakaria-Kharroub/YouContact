<?php
include 'connect.php';

if(isset($_POST['ok'])) {
    $contactID = $_GET['contactID'];
    $nom = $_POST['Nom'];
    $email = $_POST['Email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['Adress'];

    $requetUpdate = "UPDATE Contact SET Nom='$nom', Email='$email', telephone='$telephone', Adresse='$adresse' WHERE ContactID=$contactID";
    mysqli_query($conn, $requetUpdate);
}

header('location: index.php'); 
?>