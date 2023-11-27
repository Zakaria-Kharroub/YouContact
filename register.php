<!-- utlisant code normal -->
<!-- 
include 'connect.php';

if (isset($_POST['ok'])) {
    $NomUtilisateur = $_POST['NomUtilisateur'];
    echo $NomUtilisateur;
    $Email = $_POST['Email'];
    $MotDePasse = $_POST['MotDePasse'];
    $dateInscri	 = date('y-m-d');

    $requetInsert = "INSERT INTO utilisateur (`UserID`, `NomUtilisateur`, `MotDePasse`, `Email`, `dateInscri`) VALUES (NULL, '$NomUtilisateur', '$MotDePasse', '$Email', '$dateInscri')";
    $resultatINsersion = mysqli_query($conn, $requetInsert);

    if ($resultatINsersion) {
        header("Location: index.php");
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
} -->


<!-- utilisant session -->

<?php
include 'connect.php';

// Démarrez la session
session_start();

if (isset($_POST['ok'])) {
    $NomUtilisateur = $_POST['NomUtilisateur'];
    $Email = $_POST['Email'];
    $MotDePasse = $_POST['MotDePasse'];

    // Validation du NomUtilisateur (lettres uniquement)
    if (!preg_match('/^[A-Za-z]+$/', $NomUtilisateur)) {
        echo "<script>alert('nom obligatoire')</script>";
        exit();
    }

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('email obligatoire')</script>";
        exit();
    }

    if (empty($MotDePasse)) {
      echo "<script>alert('mot de pass obligatoire')</script>";
        exit();
    }

    $MotDePasseHash = password_hash($MotDePasse, PASSWORD_DEFAULT);

    $dateInscri = date('y-m-d');

    $requetInsert = "INSERT INTO utilisateur (`UserID`, `NomUtilisateur`, `MotDePasse`, `Email`, `dateInscri`) VALUES (NULL, '$NomUtilisateur', '$MotDePasseHash', '$Email', '$dateInscri')";
    $resultatINsersion = mysqli_query($conn, $requetInsert);

    if ($resultatINsersion) {
       
        $_SESSION['NomUtilisateur'] = $NomUtilisateur;
        $_SESSION['Email'] = $Email;

        header("Location: index.php");
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<?php include 'layout/head.php' ?>
<body>
    <?php include 'layout/navbar.php'; ?>

<main style="margin-top: 30px;">



<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form action=''  method="POST">

                <div class="form-outline mb-2 ">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="NomUtilisateur" required />
                  <label class="form-label" for="form3Example1cg" >Name</label>
                </div>

                <div class="form-outline mb-2">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="Email" required />
                  <label class="form-label" for="form3Example3cg"  >Email</label>
                </div>

                <div class="form-outline mb-2">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name='MotDePasse' required/>
                  <label class="form-label" for="password">Password</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-primary btn-block btn-lg gradient-custom-4 text-light" name='ok'>Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

  

    

</body>
</html>