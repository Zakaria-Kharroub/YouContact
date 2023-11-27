<?php
include ('connect.php');
session_start();
   

if (isset($_POST["ok"])) {
  $Email = $_POST["Email"];
  $pass=$_POST["MotDePasse"];
  $MotDePasse =md5($pass);
  $sqlRequette = "SELECT * FROM utilisateur WHERE Email='$Email' and MotDePasse = '$MotDePasse'";
  $result = mysqli_query($conn, $sqlRequette);
 
  if (!$result) {
      header("Location:register.php");
      exit();
  } else {
      if (mysqli_num_rows($result) > 0) {
        $row=mysqli_fetch_assoc($result);
        $_SESSION['id']=$row['UserID'];
        $_SESSION['name']=$row['NomUtilisateur'];
        $_SESSION['Email']=$row['Email'];
        $_SESSION['dateInscri']=$row['dateInscri'];
        header('Location:index.php' );
        exit(); 
      } else {
          echo "User not found";
      }
  }
}
?>
 

<!DOCTYPE html>
<html lang="en">

<?php include 'layout/head.php' ?>
<body>
    <?php include 'layout/navbar.php'; ?>

    <main style="margin-top:100px;">
    <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="images/cover.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" name='Email' class="form-control form-control-lg" placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg" name='MotDePasse' placeholder="Enter password" required/>
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name='ok' class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>

    </main>

    

    
    <?php
include ('layout/footer.php');
?>
</body>
</html>