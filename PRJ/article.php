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
  <p></p>

    <div class="row">

      <div class="col-lg-2">
        <div >
          <p></p>
        </div>
      </div>
      <div class="col-lg-1">
        <div >
          <p>Titre</p>
        </div>
      </div>
            <div class="col-lg-3">
        <div >
          <p>Description</p>
        </div>
      </div>
            <div class="col-lg-1">
        <div >
          <p>Prix</p>
        </div>
      </div>
            <div class="col-lg-1">
        <div >
          <p>Compositeur</p>
        </div>
      </div>
           <div class="col-lg-1">
        <div >
          <p>Genre</p>
        </div>   
      </div>
      <div class="col-lg-1">
        <div >
          <p>Editeur</p>
        </div>
        </div>
              <div class="col-lg-1">
        <div >
          <p>Date de parution</p>
        </div>
    </div>
              <div class="col-lg-1">
        <div >

          <p></p>
        </div>
      
      
      </div>

    </div>
    <div class="row">

<?php

$connect = mysqli_connect("localhost", "root", "", "test");  

$ID= $_GET['ID'];
$nom = $_GET['nom'];

$query = "SELECT a.lien, i.nom, i.description, i.prix, l.auteur, l.dateParution, l.editeur, l.collection, l.nbPages FROM item i, image a, livre l WHERE l.ID_livre = i.ID AND i.ID = a.ID AND i.ID = '$ID'";
	$result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                { 
                  $Nom = $row['nom'];
                  $Prix = $row['prix'];
                  $Lien = $row['lien'];
                  $description = $row['description'];
                  $auteur = $row['auteur'];
                  $editeur = $row['editeur'];
                  $collection = $row['collection'];
                  $nbPages = $row['nbPages'];

				//echo "<div>".$row['nom']."</div>";
		
	echo "<div class=col-lg-2>";
        echo "<div class=card h-100>";
          echo "<img class=card-img-top src=".$Lien.">";
       echo "</div>";
      echo "</div>";
      echo"<div class=col-lg-1>";
        echo "<div class=card-title>";
          echo "<p>".$Nom."</p>";
        echo "</div>";
    echo "</div>";
      echo "<div class=col-lg-3>";
        echo "<div>";
          echo "<p class=card-text>".$description."</p>";
        echo "</div>";
    echo "</div>";
      echo "<div class=col-lg-1>";
        echo "<div>";
          echo "<center>";
          echo "<h5>".$Prix."€</h5>";
        echo "</center>";
     echo "</div>";
    echo "</div>";
    echo "<div class=col-lg-1>";
     echo "<div>";
          echo "<p class=card-text>".$auteur."</p>";
        echo "</div>";
    echo "</div>";
          echo "<div class=col-lg-1>";
        echo "<div>";
          echo "<p class=card-text>".$editeur."</p>";
        echo "</div>";
    echo "</div>";
          echo "<div class=col-lg-1>";
        echo "<div>";
          echo "<p class=card-text>".$collection."</p>";
        echo "</div>";
    echo "</div>";
          echo "<div class=col-lg-1>";
        echo "<div>";
          echo "<p class=card-text>".$nbPages."</p>";
        echo "</div>";
    echo "</div>";
    echo "<div class=col-lg-1>";
      echo "<a href='reservation.php?ID=".$ID."&amp;nom=".$nom."'><button class=btn btn-primary btn-lg>Ajouter au panier</button></a>";
     // echo "<a href='reservation.php?ID=".$ID."&amp;nom=".$nom."'>Zoom</a>";
    echo "</div>";
}
}
?>

    </div>
    <p></p>
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
