<?php
$medecin_shuffle = $medecin->getData('medecin',$_SESSION['SESSION_EM']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css ?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Anton&family=Josefin+Sans:wght@100&family=Lexend+Deca:wght@100&family=Livvic:wght@100&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
     <link rel="icon" type="image/png" href="./logo.png" />
     <script src="./sweetAlert/jquery-3.6.0.min.js"></script>
     <script src="./sweetAlert/sweetalert2.all.min.js"></script>
      <link rel="stylesheet" href="./sweetAlert/sweetalert2.css">
     <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <title>modification du profil | Shifae</title>
    
</head>
<body>
    <div class="container" id="blur">

    <div class="navbar">
        <section class="top-nav"><!--nav bar-->
            
        <div class="navLogo">

<a href="../../../pageAcceuil/index.php">

                <img class="logo" src="../images/logo.png" alt="#">
</a>
        <a href="../../../pageAcceuil/index.php">

                <span class="chifaeNav">Shifae</span>
</a>
            </div>
            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
            </label>
            <ul class="menu">
                <li>
                    <a  class="nav-links pink" href="../../../pageAcceuil/index.php">Acceuil</a>
                </li>
                <li>
                    <a  class="nav-links " href="../../../connexionDoc/logout.php"><i class="fa-solid fa-arrow-right-from-bracket icon .logout "></i> Deconnexion</a>
                </li>
                
                
            </ul>
            <a href="../../page_profil_medecin/php">
                   
            <?php
               if($medecin_shuffle[0]['photo'] != null){
               ?>
              <img id="photo"  src="data:image;base64,<?php echo $medecin_shuffle[0]['photo'] ;?>" height="100" width="100" border-radius="50%" class="imageNavbar">
            
               <?php
               }
                else{
                  ?>
                    <img  src="../images/avatar.jpeg" alt="profile" id="photo"  height="100" width="100" border-radius="50%" class="imgNav">
              
              
              <?php
            }?>
                
        </a>
        </section> <!--nav bar end-->
      </div>