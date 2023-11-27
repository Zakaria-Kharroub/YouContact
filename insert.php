<?php
include 'connect.php';
session_start();
$id=$_SESSION['id'];
if (isset($_POST['ok'])) {
    $userID = $_POST['UserID'];
    $nom = $_POST['Nom'];
    $email = $_POST['Email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['Adress'];

    $requetInsert = "INSERT INTO Contact (UserID, Nom, Email, telephone, Adresse) VALUES ('$id', '$nom', '$email', '$telephone', '$adresse')";
    $resultatINsersion = mysqli_query($conn, $requetInsert);

    if ($resultatINsersion) {
        header("Location: index.php");
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>