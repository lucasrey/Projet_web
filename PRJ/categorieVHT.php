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
          <p>Nom</p>
        </div>
      </div>
      <div class="col-lg-1">
        <div >
          <p>Type</p>
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
          <p>Couleur</p>
        </div>
      </div>
           <div class="col-lg-1">
        <div >
          <p>Taille</p>
        </div>   
      </div>
      <div class="col-lg-3">
        <div >
          <p></p>
        </div>
        </div>

    </div>
    <div class="row">
     <?php  
 

$Nom= $_GET['nom'];
$Type = $_GET['type'];
$Description = $_GET['description'];
$Prix = $_GET['prix'];
$Couleur = $_GET['couleur'];
$Taille = $_GET['taille'];
$ID = $_GET['ID'];


      echo"<div class=col-lg-2>";
        echo "<div class=card-title>";
          echo "<p>".$Nom."</p>";
        echo "</div>";
    echo "</div>";
      echo"<div class=col-lg-1>";
        echo "<div class=card-title>";
          echo "<p>".$Type."</p>";
        echo "</div>";
    echo "</div>";
      echo "<div class=col-lg-3>";
        echo "<div>";
          echo "<p class=card-text>".$Description."</p>";
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
          echo "<p class=card-text>".$Couleur."</p>";
        echo "</div>";
    echo "</div>";
          echo "<div class=col-lg-1>";
        echo "<div>";
          echo "<p class=card-text>".$Taille."</p>";
        echo "</div>";
    echo "</div>";
    echo "<div class=col-lg-3>";
      echo "<button><a href='reservation.php?ID=".$ID."&amp;nom=".$Nom."'>Ajouter au panier</a></button>";
     // echo "<a href='reservation.php?ID=".$ID."&amp;nom=".$nom."'>Zoom</a>";
    echo "</div>";

$connect = mysqli_connect("localhost", "root", "", "test");  

      $query = "SELECT distinct m.lien FROM item i, image m, vetement l, variation v WHERE i.ID = m.ID AND i.ID = l.ID_vetement AND i.nom = '$Nom' AND l.ID = v.ID_variation AND v.genre = 'Homme' AND i.ID_cl is NULL AND i.statut is NULL AND l.type = '$Type' AND v.couleur = '$Couleur' AND v.taille = '$Taille'"; 

           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                { 
                 // echo $Nom;
                  $lien = $row['lien'];


                  echo "<div class=col-lg-2>";
        echo "<div class=card h-100>";
          echo "<img class=card-img-top src=".$lien.">";
       echo "</div>";
      echo "</div>";
   }
 }
       ?>