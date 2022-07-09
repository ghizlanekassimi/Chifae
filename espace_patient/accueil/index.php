<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="icon" type="image/png" href="./images/logo.png" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link
  rel="stylesheet"
  href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css"
/>
    <!-- cdn icons link  -->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <title>Accueil | Shifae</title>
      <!-- Font Awesome CDN Link -->
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!---------------------------BOX ICONS ------------------------------>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">

    <title>Bienvenu</title>
</head>
<body>
   <div class="wrapp">
    <div class="nav">
        <nav>
            <div class="container nav_container">
              <div class="logo_cont">
                <a href="index.html"
                  ><img src="./assets/Layer1.png" alt="logo" class="logo"
                /></a>
                <h4>Shifae</h4>
              </div>
              <ul class="nav-menu">
                <li><a href="index.php">Acceuil</a></li>
                <li class="medecin"><a href="../profilMedical/index.php">Mon profil médical</a></li>
                <li class="patient"><a href="../profilMedical/document.php">Documents</a></li>
              </ul>
              <!-- drop down medecin  -->
              <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"></button>
                <div id="myDropdown" class="dropdown-content">
                  <hr class="solid" />
                  <a href="#">Mon espace </a>
                  <hr class="solid" />
                  <a href="#">Mes blogs</a>
                  <hr class="solid" />
                  <a href="#">Se déconnecter</a>
                  <hr class="solid" />
                </div>
              </div>
              <!-- end  drop down medecin  -->
              
              <!-- drop down patient -->
              <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"></button>
                <div id="myDropdown" class="dropdown-content">
                  <hr class="solid" />
                  <a href="#">Mon dossier medical</a>
                  <hr class="solid" />
                  <a href="#">Prendre un rendez-vous</a>
                  <hr class="solid" />
                  <a href="#">Se déconnecter</a>
                  <hr class="solid" />
                </div>
              </div>
              <!-- end drop down patient -->
              <!-------------------------------------------------->
             <input type="image"  src="images/noprofil.jpg" alt="profile" id="user">
              <button class="open_menu_botton"><i class="uis uis-bars"></i></button>
              <button class="close_menu_botton">
                <i class="uis uis-multiply"></i>
              </button> 
              
            
            </div>
          </nav>
    </div>
    <!-----------------PROFIL MODAL------------------>
       <div class="overlay " >
       
         <div id="popup" class="popup">
          <div class="modal-btn"  >
            <button class="close_menu_botton2"> <i class="uis uis-multiply close2" ></i> </button> 
              <img type="image"  src="images/noprofil.jpg" alt="profile" id="account">
                <h3 id="bienvenu">Bienvenue dans votre Espace de Santé</h3>
                   <a class="pop"href="../profilMedical/index.php" target="_blank" id="monProfil">Mes infos</a>
                   <a class="pop" href="#" id="deconnect">Se déconnecter</a>
        </div>
         </div>
        
       </div>
    <!-- ------------------------------------------ -->
       <div class="main">
           <!-- ====================WELCOME========================= -->

           <div class="welcome border">
            <div class="hello">
                <p id="salut" class="texte ">Salut,<span id="fullName">&nbsp;Najma Blqasm</span></p>
                <p class="texte hidden visibility1">Avez une bonne journée et n'oubliez pas de prendre soin de votre santé</p>
                <p class="texte"><a href="../../pageAcceuil/index.html"id="prendre-rdv">Prendre un RDV ></a></p>
              </div>
              <img class="" id="hello"src="images/doctor.png" alt="doctor">
           </div>
           
               
                <!-------------------Schedule2 for Mobile----------------------------->
                <div class="schedule visibility">
                    <h2 class="titre-rdv ">Vos Rendez-vous:</h2>
                    <div class="rdv border">
                        <img src="images/dentiste.PNG" alt="specialite">
                        <div id="doctor">
                            <p id="specialite">Dentiste</p>
                            <p id="specialiste">Dr.Hiba Lwazani</p>
                    </div>
                        <p id="time">10 AM</p>
                    </div>
                    <div class="rdv border">
                        <img src="images/generaliste.PNG" alt="specialite">
                        <div id="doctor">
                            <p id="specialite">Generaliste</p>
                            <p id="specialiste">Dr.Hiba Lwazani</p>
                    </div>
                        <p id="time">10 AM</p>
                    </div>
                
                </div>
                <!--===================links to FONCTIONNALITIES========================-->
           
        <!-- <a href="../profilMedical/document.html" target="_blank" id="doc-bt" class="btn"><img src="images/doc.PNG" class="icons"><span class="link">Ajouter un document</span></a> -->
        <!-- <a href="../profilMedical/index.html" target="_blank"  id="mesure-bt" class="btn"><img src="images/mesure.PNG" class="icons"><span class="link">Ajouter une mesure</span></a> -->
           <!-- <a href="../profilMedical/index.html" target="_blank" id="profil-bt" class="btn"><img src="images/profil.PNG" class="icons"><span class="link">Compléter mon profil médical</span></a>  -->
           <!--------------------------------H2----------------------------->
             <h2 class="">Votre Espace de Santé</h2>
           <!--===================FONCTIONNALITES========================-->
           <div class="profil fct">
            <img src="images/profi.png" alt="profil-image" class="imgs">
            <h3 class="hover-underline-animation">Profil Médical</h3>
            <p>Renseignez votre profil médical et le partagez avec ceux qui vous soingnent</p>
           </div>
           <div class="doc fct">
            <img src="images/docy.png" alt="docs-image" class="imgs">
            <h3 class="hover-underline-animation">Documents</h3>
            <p>Stockez ,classez et partagez votre documents de santé </p>
           </div>
           <!-- <div class="appointement fct">
            <img src="images/appointement.png" alt="appointement-image" class="imgs">
            <h3 class="hover-underline-animation">Rendez-Vous</h3>
            <p>Prendre un rendez-vous chez les professionnels de santé que vous choissisez et visualiser vos rendez-vous </p>
           </div>  -->
           
       </div>
               <!-- ====================Aside========================= -->

       <div class="aside hidden border">
        <img src="images/c10.png" alt="bg" id="bg">
        <img  class=" "src="images/noprofil.jpg" alt="profile" id="profile">
        
          <!-------------------Schedule----------------------------->
        <div class="schedule ">
            <p class="titre-rdv hover-underline-animation">Vos Rendez-vous:</p>

          <div class="rdv borderColorful">
              <img src="images/dentiste.PNG" alt="specialite">
              <div id="doctor">
                  <p id="specialite">Dentiste</p>
                  <p id="specialiste">Dr.Hiba Lwazani</p>
          </div>
              <p id="time">10 AM</p>
          </div>
          <div class="rdv borderColorful">
              <img src="images/generaliste.PNG" alt="specialite">
              <div id="doctor">
                  <p id="specialite">Generaliste</p>
                  <p id="specialiste">Dr.Hiba Lwazani</p>
          </div>
              <p id="time">10 AM</p>
          </div>
      
      </div>

       </div>
       <footer>
        <div class="container">
          <div class="wrapper">
            <div class="footer-widget">
              <a href="#">
                  <div class="logo-footer">
                <img src="assets/Layer1.png" class="logo" />
                <p>Shifae</p></div>
              </a>
              <p class="desc">
              </p>
              <ul class="socials">
                <li>
                  <a href="#">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="footer-widget">
              <h6>des liens rapides</h6>
              <ul class="links">
                <li><a href="#">Acceuil</a></li>
                <li><a href="#"></a>Se connecter</li>
                <li><a href="#">services</a></li>
                <!-- <li><a href="#">testimonial</a></li> -->
                <li><a href="#">contact</a></li>
              </ul>
            </div>
            <div class="footer-widget">
              <h6>Services</h6>
              <ul class="links">
                <li><a href="#">SOS</a></li>
                <li><a href="#">livraison de médicaments</a></li>
                <li><a href="#">Pharmacies de garde</a></li>
                <li><a href="#">Contacts de Laboratoires</a></li>
              </ul>
            </div>
            <div class="footer-widget">
              <h6>Aide &amp; Support</h6>
              <ul class="links">
                <!-- <li><a href="#">support center</a></li> -->
                <!-- <li><a href="#">live chat</a></li> -->
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Conditions Générales d’Utilisation </a></li>
              </ul>
            </div>
          </div>
          <div class="copyright-wrapper">
            <p>
                © 2022 Shifae.com - Tous les droits sont réservés
              <a href="#" target="blank">Shifae</a>
            </p>
          </div>
        </div>
      </footer>      
   </div>


<script src="js/script1.js"></script>
<script src="js/script.js">

</script>
</body>
</html>