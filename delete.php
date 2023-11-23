<?php
include 'connect.php';

if ( isset($_POST['deletebtn']) && isset($_POST['contactID'])) {
    $contactID = $_POST['contactID'];

    $deleteQuery = "DELETE FROM Contact WHERE ContactID = $contactID";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        header("Location: index.php");
    } else {
        echo "errour delete contact " . mysqli_error($conn);
    }
}
?>


