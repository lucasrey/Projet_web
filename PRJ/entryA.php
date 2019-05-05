
<?php  
 //entry.php  
//connect = mysqli_connect("localhost", "root", "", "test");  
 session_start();
 $utilisateur = $_SESSION["username"];  

 ?>  
<!DOCTYPE html> 
<html> 
<head>
    <title> EC E-Shop </title>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script type="text/javascript">   
      $(document).ready(function(){     
        $('.header').height($(window).height());    
      });  
    </script> 
  <link href="style.css" rel="stylesheet">


</head>

<body>

 <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
  <a class="navbar-brand" href="index.html"><img src="img/logo4.png" alt= "nom de ton image" width="120"></a>
    
  <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Catégorie
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="categorieLivre.php">Livre</a>
        <a class="dropdown-item" href="categorieMusique.php">Musique</a>
        <a class="dropdown-item" href="Vetements.html">Vetements</a>
        <a class="dropdown-item" href="categorieSportLoisir.php">Sport et Loisirs</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Bestseller.php">Ventes flash</a>
    </li>
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Se connecter</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="indexA.php">Administrateur</a>
        <a class="dropdown-item" href="indexF.php">Vendeur</a>
        <a class="dropdown-item" href="#">Particulier</a>
         </div>
    </li>
         <li class="nav-item">
             <a class="nav-link" href="panierfinal.php">Panier</a>
             
             
             
    </li>
          
  </ul>


</nav>
           <br /><br /> 

           <div id="right">
           <?php 
            include("informationA.php");
           ?>
           </div>  

           <div class="container" style="width:500px;">  
                <h3 align="center">Menu</h3>  
                <br />  
                <?php  
                echo '<h1>Bienvenue - '.$_SESSION["username"].'</h1>';  
                echo '<label><a href="logoutA.php">Deconnexion</a></label>';  
                ?>
                <form method="post">       
                <p><br>
                <p></p>
                <a>
                Gestionnaire Items : Supprimer
                </a>
                <div>
                <a href="SLivread.php">Livre</a>
                <a href="SMusiquead.php">Musique</a>
                <a href="SSportLoisirad.php">Sport et Loisir</a>
                <a href="SVetements.php">Vetements</a>
                <a href="SVendeur.php">Vendeur</a>
                 </div>
                <a>
                Gestionnaire Items : Ajouter
                </a>
                <div>
                <a href="LivreA.php">Livre</a>
                <a href="MusiqueA.php">Musique</a>
                <a href="VetementA.php">Vetements</a>
                <a href="SportLoisirA.php">Sport et Loisirs</a>
                <a href="Vendeur.php">Vendeur</a>
                </div>
              
              <!--  <input type="submit" value="Submit" />-->
                </form>
           </div>

  <!-- Footer -->
    <footer class="footer-distributed">

      <div class="footer-left">

        <h3>EC<span>E-SHOP</span></h3>

        <p class="footer-links">
          <a href="#">Home</a>
          ·
          <a href="#">Blog</a>
          ·
          <a href="#">Pricing</a>
          ·
          <a href="#">About</a>
          ·
          <a href="#">Faq</a>
          ·
          <a href="#">Contact</a>
        </p>

        <p class="footer-company-name">EC-Eshop &copy; 2015</p>

        <div class="footer-icons">

          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
          <a href="#"><i class="fab fa-github"></i></a>

        </div>

      </div>

      <div class="footer-right">

        <p>Contactez-nous</p>

        <form action="#" method="post">

          <input type="text" name="email" placeholder="Email" />
          <textarea name="message" placeholder="Message"></textarea>
          <button>Send</button>

        </form>

      </div>
<audio controls>
  <source src="img/demuja.mp3" type="audio/mpeg">
  <source src="img/demuja.mp3" type="audio/ogg">
  Votre navigateur ne supporte pas la balise audio.
</audio>
    </footer> 

</body>


</html>
