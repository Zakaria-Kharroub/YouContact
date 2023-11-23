<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['UserID'];
    $nom = $_POST['Nom'];
    $email = $_POST['Email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['Adress'];

    $insertQuery = "INSERT INTO Contact (UserID, Nom, Email, telephone, Adresse) VALUES ('$userID', '$nom', '$email', '$telephone', '$adresse')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>