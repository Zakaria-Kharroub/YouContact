<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contactID'])) {
    $contactID = $_POST['contactID'];

    $deleteQuery = "DELETE FROM Contact WHERE ContactID = $contactID";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        header("Location: index.php");
        exit();
    } else {
        echo "errour delete contact " . mysqli_error($conn);
    }
}
?>


