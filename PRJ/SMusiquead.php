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
    <h3 align="center">Suppression : Musique </h3>  

    <div class="row">

      <div class="col-lg-4">
        <p></p>
      </div>

      <div class="col-lg-4">
        <p></p>
                <br />  
                <form method="post">
                     
                     <label>ID des Musiques</label>  
                     <select name="livre"> 


<?php

session_start(); 

// test
 $Session = isset($_SESSION["username"]);

$Pseudo= $_SESSION["username"];
//echo $Pseudo;
 if(!isset($_SESSION["username"]))  
 {  
      header("location:indexF.php?action=login");
 }

     $connect = mysqli_connect("localhost", "root", "", "test");

    // Trouver ID du vendeur
   // $use = mysqli_real_escape_string($connect, $_POST["use"]);  

	$connect = mysqli_connect("localhost", "root", "", "test");  

    $sql = "SELECT p.PersonID from administrateur v, person p where p.PersonID = v.IDPerson AND v.pseudo = '$Pseudo'";
    $result = mysqli_query($connect, $sql);
    while ($ligne=mysqli_fetch_assoc($result)) 
    {$ID = $ligne['PersonID'];
   // echo $ID; 
    }//end while


    $query = "SELECT distinct i.ID FROM item i, musique l WHERE i.ID = l.ID_musique AND i.ID_ad = '$ID'"; 

           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                { 

                  $IDMusique = $row['ID'];
                 // echo $IDMusique;
                  echo "<option class=form-control value=".$IDMusique.">$IDMusique</option>";

              }

          }

if(isset($_POST["register"]))  
{ 

$sql="ALTER TABLE image
ADD CONSTRAINT ID FOREIGN KEY (ID) REFERENCES item(ID) ON DELETE CASCADE";
if(mysqli_query($connect, $sql)){
	echo '<script>alert("Table musique : Altered")</script>';

}
$sql="DELETE FROM image WHERE ID = '$IDMusique'";
if(mysqli_query($connect, $sql)){
	echo '<script>alert("Image deleted")</script>';

}
$sql="ALTER TABLE musique
ADD CONSTRAINT ID_musique FOREIGN KEY (ID) REFERENCES item(ID) ON DELETE CASCADE";
if(mysqli_query($connect, $sql)){
	echo '<script>alert("Table musique : altered")</script>';

}
$sql = "DELETE FROM musique WHERE ID = '$IDMusique'";
if(mysqli_query($connect, $sql)){
	echo '<script>alert("Music deleted")</script>';

}
$sql="DELETE FROM item WHERE ID = '$IDMusique'";
if(mysqli_query($connect, $sql)){
	echo '<script>alert("Item deleted")</script>';

}
}  
   

?> 
                     <input type="submit" name="register" value="Supprimer" class="btn btn-info" />  

                </form></select></form></div></div></div>
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
