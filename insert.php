<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['Nom'];
    $email = $_POST['Email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['Adress'];

    $insertQuery = "INSERT INTO Contact (Nom, Email, telephone, Adresse) VALUES ('$nom', '$email', '$telephone', '$adresse')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        header("Location: index.php");
        exit();
    } else {
        echo "erreur : " . mysqli_error($conn);
    }
}
?>