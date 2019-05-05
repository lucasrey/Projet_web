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

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Vetements Femme</h1>
          <p>Profitez de toute notre gamme de vetements feminins</p>
    

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <p></p>

<?php  

/// Ici on affiche le Nom et le Type de produits pour Femme
/// En mettant en parametre url toutes les informations pour les affichés plus tard

$connect = mysqli_connect("localhost", "root", "", "test");  

      $query = "SELECT distinct i.nom, i.ID, l.type, i.description, i.prix, v.couleur, v.taille FROM item i, image m, vetement l, variation v WHERE i.ID = m.ID AND i.ID = l.ID_vetement AND l.ID = v.ID_variation AND v.genre = 'Femme' AND i.ID_cl is NULL AND i.statut is NULL"; 

           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                { 
                  $Description = $row['description'];
                  $Prix = $row['prix'];
                  $Couleur = $row['couleur'];
                  $Taille = $row['taille'];
                  $Nom = $row['nom'];
                  $Type = $row['type'];
                  $ID = $row['ID'];
   //echo "<div class=row>";

          echo "<div class=col-lg-8 col-md-6 mb-4>";

              echo "<div class=card-body>";
                echo "<h4 class=card-title>";
                    echo $Nom;
                    echo "</h4>";
                    echo "<h5>".$Type."</h5>";
                    echo "<a href='categorieVFT.php?nom=".$Nom."&amp;ID=".$ID."&amp;type=".$Type."&amp;description=".$Description."&amp;prix=".$Prix."&amp;couleur=".$Couleur."&amp;taille=".$Taille."'><button class=btn btn-primary btn-lg>Voir l'article</button></a>";
                  //  echo "<button><a href='categorieVFT.php?nom=".$Nom."&amp;type=".$Type."&amp;description=".$Description."&amp;prix=".$Prix."&amp;couleur=".$Couleur."&amp;taille=".$Taille."'>Zoom</a></button>";

              echo "</div>";
          echo "</div>";

}
}
?> 
        </div>


      </div>
    

    </div>
  

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
