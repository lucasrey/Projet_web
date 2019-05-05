<?php  
 //entry.php  
 session_start(); 

// test
 $Session = isset($_SESSION["username"]);


 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");
 }
if(isset($_POST["register"]))  
 {  
  echo "$Session";
    /// Trouver ID du client 
    $connect = mysqli_connect("localhost", "root", "", "test");

    // Trouver ID du vendeur
    $use = mysqli_real_escape_string($connect, $_POST["use"]);  
    
/*    if ( != isset($_SESSION["username"])) {
      echo '<script>alert("ERREUR")</script>';
      header("location:entryF.php"); 
    }*/

    $sql = "SELECT PersonID from administrateur where pseudo = '$use'";
    $result = mysqli_query($connect, $sql);
    while ($ligne=mysqli_fetch_assoc($result)) 
    {$ID = $ligne['PersonID']; }//end while


    /// Trouver ID du futur item
    $sql = " SELECT MAX(ID) AS i FROM item";    
    $result = mysqli_query($connect, $sql);      
    if ($data = mysqli_fetch_assoc($result)) {
        $idLivre = $data['i']+1;
    }
    

    // Insérer dans item
     $nom = mysqli_real_escape_string($connect, $_POST["nom"]);  
     $photo = mysqli_real_escape_string($connect, $_POST["photo"]);
     $photo2 = mysqli_real_escape_string($connect, $_POST["photo2"]);
     $photo3 = mysqli_real_escape_string($connect, $_POST["photo3"]);
     $photo4 = mysqli_real_escape_string($connect, $_POST["photo4"]);
     $description = mysqli_real_escape_string($connect, $_POST["description"]);  
     $prix = mysqli_real_escape_string($connect, $_POST["prix"]);  

    $query = "INSERT INTO item (ID, nom, description, prix, ID_ad) 
    VALUES('$idLivre', '$nom', '$description', '$prix', '$ID')";  
    if(mysqli_query($connect, $query))  
    {echo '<script>alert("Item Registration Done")</script>';}

    $sql = " SELECT MAX(ID_image) AS i FROM image";    
    $result = mysqli_query($connect, $sql);      
    if ($data = mysqli_fetch_assoc($result)) {
    $Image = $data['i']+1;
}
    // Inserer dans image
    $Image2 = $Image + 1;
    $Image3 = $Image2 + 1;
    $Image4 = $Image3 + 1;
    $query = "INSERT INTO image (ID_image, lien, ID) VALUES('$Image', '$photo', '$idLivre')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("Image Registration Done")</script>';}

    $query = "INSERT INTO image (ID_image, lien, ID) VALUES('$Image2', '$photo2', '$idLivre')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("Image Registration Done")</script>';}

    $query = "INSERT INTO image (ID_image, lien, ID) VALUES('$Image3', '$photo3', '$idLivre')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("Image Registration Done")</script>';}

    $query = "INSERT INTO image (ID_image, lien, ID) VALUES('$Image4', '$photo4', '$idLivre')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("Image Registration Done")</script>';}

    $type = mysqli_real_escape_string($connect, $_POST["type"]); 
    $genre = mysqli_real_escape_string($connect, $_POST["genre"]);  
    $couleur = mysqli_real_escape_string($connect, $_POST["couleur"]);
    $taille = mysqli_real_escape_string($connect, $_POST["taille"]);  

    // Inserer dans Livre
    $query = "INSERT INTO vetement(ID, type, ID_vetement) VALUES('$idLivre', '$type', '$idLivre')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("vetement Registration Done")</script>';}

        // Inserer dans Livre
    $query = "INSERT INTO variation(ID, genre, couleur, taille, ID_variation) VALUES('$idLivre', '$genre', '$couleur', '$taille', '$idLivre')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("Book Registration Done")</script>';}


}
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Vetements</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  

           <div ad="right" >
           <?php 
           include("informationA.php");
           ?>
           </div> 

           <div class="container" style="width:500px;">  
                
                <br />  
                <?php  
                echo '<h1>Bienvenue - '.$_SESSION["username"].'</h1>';  
                echo '<label><a href="logoutF.php">Logout</a></label>';  
                ?>  
           </div> 


           <div class="container" style="width:500px;">  
                <h3 align="center">Ajout : Vetements</h3>  
                <br />   
                <h3 align="center">Login</h3>  
                <br />  
                <form method="post"> 
                     <label>Username</label>  
                     <input type="text" name="use" class="form-control" />  
                     <br /> 
                     <label>Nom</label>  
                     <input type="text" name="nom" class="form-control" />  
                     <br />  
                     <label>Photo 1</label>  
                     <input type="text" name="photo" class="form-control" />  
                     <br />
                     <label>Photo 2</label>  
                     <input type="text" name="photo2" class="form-control" />  
                     <br />
                     <label>Photo 3</label>  
                     <input type="text" name="photo3" class="form-control" />  
                     <br />
                     <label>Photo 4</label>  
                     <input type="text" name="photo4" class="form-control" />  
                     <br />
                     <label>Description</label> 
                     <input type="text" name="description" class="form-control" />  
                     <br />    
                     <label>Prix</label>  
                     <input type="text" name="prix" class="form-control" />  
                     <br />
                     <label>Type</label> 
                     <input type="text" name="type" class="form-control" />  
                     <br />  
                     <label>Genre</label>  
                     <input type="text" name="genre" class="form-control" />  
                     <br />  
                     <label>Couleur</label>  
                     <input type="text" name="couleur" class="form-control" />  
                     <br />
                     <label>Taille</label> 
                     <input type="text" name="taille" class="form-control" />  
                     <br />  
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                  <!--   <p align="center"><a href="index.php">Register</a></p>-->
                </form>  
           </div>  

      </body>  
 </html>  

 