<?php
include 'connect.php';

$query = "SELECT * FROM Contact";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'layout/head.php' ?>

<body >
  
<?php include 'layout/navbar.php'; ?>

  <!-- ------------------- -->
<main class='container'>


<h1 class='text-center'>Liste des Contacts</h1>
<!-- Button trigger modal -->
<div class="btn-ajout-modal" style="margin-top: 20px;display:flex;justify-content: center;">
 
  <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  ajouter contact
  </button>
</div>



<div style="height: 470px; overflow: scroll;">
<table class="container table mt-4" >
  <thead>
    <tr>
      <!-- <th scope="col">ID</th> -->
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
            // echo "<td>" . $row['ContactID'] . "</td>";
            echo "<td><i class='fa-solid fa-user'></i></td>";
            echo "<td>" . $row['Nom'] . "</td>";
            echo "<td>" . $row['telephone'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Adresse'] . "</td>";

            echo "
            <td class='d-flex'>
                <button type='submit' class='btn btn-primary' style='height: 40px;' data-bs-toggle='modal' data-bs-target='#exampleModal{$row['ContactID']}'><i class='fa-solid fa-pen-to-square'></i></button>
            <form action='delete.php' method='post'class='ms-2'>
                <input type='hidden' name='contactID' value='" . $row['ContactID'] . "'>
                <button type='submit' name='deletebtn' class='btn btn-danger' style='height: 40px;'><i class='fa-solid fa-trash'></i></button>
            </form>
            </td>";

            echo "</tr>";

              ?>

<!-- modal update -->
<div class="modal fade" id="exampleModal<?=$row['ContactID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouveau contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="update.php?id=<?=$row['ContactID'] ?>" method="POST">
            <!-- <form action="update.php?contactID=<?=$row['ContactID']?>" method="POST"> -->
                <div class="modal-body">
                   <!-- user id -->

                    <!-- name -->
                    <div >
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="Nom" value='<?=$row['Nom'] ?>' required>
                    </div>

                    <!-- email -->
                    <div >
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="Email" value='<?=$row['Email'] ?>' required>
                    </div>

                    <!-- email -->
                    <div >
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" value='<?=$row['telephone'] ?>' required>
                    </div>

                    <!-- adress -->
                    <div >
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="Adress" value='<?=$row['Adresse'] ?>' required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">effacer</button>
                    <button type="submit" name='ok' class="btn btn-primary">update</button>
                </div>
            </form>
        </div>
    </div>
</div>

              
              <?php } ?>
            </tbody>
</table>

</div>


<!-- <div class='mt-5'>
<button type="button" class="btn btn-success">Ajouter un contact</button>
</div> -->




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouveau contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="insert.php" method="POST">
                <div class="modal-body">
                   <!-- user id -->
                    <div >
                        <label for="UserID" class="form-label">UserID</label>
                        <input type="number" class="form-control" id="UserID" name="UserID" required>
                    </div>

                    <!-- name -->
                    <div >
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="Nom" required>
                    </div>

                    <!-- email -->
                    <div >
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="Email" required>
                    </div>

                    <!-- email -->
                    <div >
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" required>
                    </div>

                    <!-- adress -->
                    <div >
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="Adress" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">reset</button>
                    <button type="submit" name='ok' class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

</main>



    
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



