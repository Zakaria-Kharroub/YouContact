<?php
include ('connect.php');
session_start();

if(!isset($_SESSION['id'])){
    header('location:login.php');
}
   


?>


<!DOCTYPE html>
<html lang="en">

<?php include 'layout/head.php' ?>
<body>
    <?php include 'layout/navbar.php'; ?>



    <div class="container mt-5 mb-4 p-3 d-flex justify-content-center "> 
  <div class="card p-4"> 
    <div class="image d-flex flex-column justify-content-center align-items-center"> 
      <button class="btn btn-secondary"> 
        <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
      </button> 
      <h1 class="name mt-3"><?php echo $_SESSION['name'];?></h1> 
      
      <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
        <h3 class="idd1"><?php echo $_SESSION['Email'];?></h3> 
       
      </div> 
   
      <div class="d-flex mt-2"> 
        <button class="btn1 btn-dark">Modifier le profil</button> 
      </div> 
      <div class="text mt-3"> 
        <span>walid samikr est une créatrice de graphiques minimalistes et audacieux ainsi que d'œuvres numériques.<br></span> 
      </div> 
      <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
        <h4><i class="fa-brands fa-facebook"></i></h4> 
        <h4><i class="fa-brands fa-linkedin"></i></h4> 
        <h4><i class="fa-brands fa-github"></i></h4> 
        <h4><i class="fa-brands fa-twitter"></i></h4> 
        
      </div> 
      <div class="px-2 rounded mt-4 date "> 
        <span class="join">Rejoint en <?php  echo $_SESSION['dateInscri']; ?></span> 
      </div> 
    </div> 
  </div>
</div>

    



   

    </main>
<?php
include ('layout/footer.php');
?>
</body>
</html>