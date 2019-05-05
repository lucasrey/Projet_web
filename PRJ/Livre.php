<?php  
 //entry.php  
 session_start(); 

// test
 $Session = isset($_SESSION["username"]);


 if(!isset($_SESSION["username"]))  
 {  
      header("location:indexF.php?action=login");
 }
if(isset($_POST["register"]))  
 {  
  //echo "$Session";
    /// Trouver ID du client 
    $connect = mysqli_connect("localhost", "root", "", "test");

    // Trouver ID du vendeur
    $use = mysqli_real_escape_string($connect, $_POST["use"]);  
    
/*    if ( != isset($_SESSION["username"])) {
      echo '<script>alert("ERREUR")</script>';
      header("location:entryF.php"); 
    }*/

    $sql = "SELECT PersonID from vendeur where pseudo = '$use'";
    $result = mysqli_query($connect, $sql);
    while ($ligne=mysqli_fetch_assoc($result)) 
    {$ID = $ligne['PersonID']; }//end while


    /// Trouver ID du futur item
    $sql = " SELECT MAX(ID) AS i FROM item";    
    $result = mysqli_query($connect, $sql);      
    if ($data = mysqli_fetch_assoc($result)) {$idLivre = $data['i']+1;}

    $sql = " SELECT MAX(ID_image) AS m FROM image";    
    $result = mysqli_query($connect, $sql);      
    if ($data = mysqli_fetch_assoc($result)) {$Image = $data['m']+1;}
    

    // Insérer dans item
     $nom = mysqli_real_escape_string($connect, $_POST["nom"]);  
     $photo = mysqli_real_escape_string($connect, $_POST["photo"]);
     $description = mysqli_real_escape_string($connect, $_POST["description"]);  
     $prix = mysqli_real_escape_string($connect, $_POST["prix"]);  

    $query = "INSERT INTO item (ID, nom, description, prix, ID_vd) 
    VALUES('$idLivre', '$nom', '$description', '$prix', '$ID')";  
    if(mysqli_query($connect, $query))  
    {echo '<script>alert("Item Registration Done")</script>';}

    // Inserer dans image
    $query = "INSERT INTO image(ID_image, lien, ID) VALUES('$Image', '$photo', '$idLivre')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("Image Registration Done")</script>';}

    $auteur = mysqli_real_escape_string($connect, $_POST["auteur"]); 
    $parution = mysqli_real_escape_string($connect, $_POST["parution"]);  
    $editeur = mysqli_real_escape_string($connect, $_POST["editeur"]);
    $collection = mysqli_real_escape_string($connect, $_POST["collection"]);  
    $page = mysqli_real_escape_string($connect, $_POST["page"]); 

    // Inserer dans Livre
    $query = "INSERT INTO livre(ID, auteur, dateParution, editeur, collection, nbPages, ID_livre) VALUES('$idLivre', '$auteur', '$parution', '$editeur', '$collection', '$page', '$idLivre')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("Book Registration Done")</script>';}


}
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Livre</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />
           <div ad="right" >
           <?php 
           include("informationF.php");
           ?>
           </div> 
           <div class="container" style="width:500px;">  
              <!--  <h3 align="center"></h3>  -->
                <br />  
                <?php  
                echo '<h1>Bienvenue - '.$_SESSION["username"].'</h1>';  
                echo '<label><a href="logoutF.php">Deconnexion</a></label>';  
                ?>  
           </div> 


           <div class="container" style="width:500px;">  
                <h3 align="center">Ajout : Livre</h3>  
                <br />   
                <h3 align="center">Login</h3>  
                <br />  
                <form method="post"> 
                     <label>Username</label>  
                     <input type="text" name="use" value= "<?php echo $_SESSION["username"];?>" class="form-control" />  
                     <br /> 
                     <label>Nom</label>  
                     <input type="text" name="nom" class="form-control" />  
                     <br />  
                     <label>Photo</label>  
                     <input type="text" name="photo" class="form-control" />  
                     <br />
                     <label>Description</label> 
                     <input type="text" name="description" class="form-control" />  
                     <br />    
                     <label>Prix</label>  
                     <input type="text" name="prix" class="form-control" />  
                     <br />
                     <label>Auteur</label> 
                     <input type="text" name="auteur" class="form-control" />  
                     <br />  
                     <label>Date de paution</label>  
                     <input type="date" name="parution" class="form-control" />  
                     <br />  
                     <label>Editeur</label>  
                     <input type="text" name="editeur" class="form-control" />  
                     <br />
                     <label>Collection</label> 
                     <input type="text" name="collection" class="form-control" />  
                     <br />  
                     <label>Nombre de pages</label>  
                     <input type="text" name="page" class="form-control" />  
                     <br />  
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                  <!--   <p align="center"><a href="index.php">Register</a></p>-->
                </form>  
           </div>  

      </body>  
 </html>  

 