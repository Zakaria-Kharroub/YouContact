<?php
include 'connect.php';

// Requête pour récupérer tous les contacts
$query = "SELECT * FROM Contact";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php' ?>

<body>
  
<?php include 'navbar.php'; ?>



    <!-- ------------------- -->
<main class='container'>
<h1 class='text-center'>Liste des Contacts</h1>
    <table class="container table mt-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Profil</th>
      <th scope="col">Name</th>
      <th scope="col">Telephone</th>
      <th scope="col">Email</th>
      <th scope="col">Adress</th>
      <th scope="col">Edit/Delete</th>
      
      
    </tr>
  </thead>
  <tbody>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ContactID'] . "</td>";
            echo "<td><i class='fa-solid fa-user'></i></td>";
            echo "<td>" . $row['Nom'] . "</td>";
            echo "<td>" . $row['telephone'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Adresse'] . "</td>";
            echo "<td>
                  <button type='button' class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i></button>
                  <button type='button' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>
                  </td>";
                  echo "</tr>";
                }
                ?>
            </tbody>
</table>
<center>
<div class='mt-5'>
<button type="button" class="btn btn-success">Ajouter un contact</button>
</div>
</center>

</main>





<!-- start footer -->

<!--end footer  -->

    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>



  <!-- <tr>
      <th scope="row">1</th>
      <td><i class="fa-solid fa-user"></i></td>
      <td>Ali</td>
      <td>0645231734</td>
      <td>ali@gmail.com</td>
      <td>youssoufia maroc</td>
      <td>
        <button type="button" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
        <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
      </td>
      
    </tr> -->