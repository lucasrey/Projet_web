<?php  
 //entry.php  
 session_start(); 

// test
 $Session = isset($_SESSION["username"]);


 if(!isset($_SESSION["username"]))  
 {  
      header("location:indexA.php?action=login");
 }
if(isset($_POST["register"]))  
 {  
  //echo "$Session";
    /// Trouver ID du client 
    $connect = mysqli_connect("localhost", "root", "", "test");

    // Trouver ID du vendeur
    $use = mysqli_real_escape_string($connect, $_POST["use"]);  

    $sql = "SELECT PersonID from administrateur where pseudo = '$use'";
    $result = mysqli_query($connect, $sql);
    while ($ligne=mysqli_fetch_assoc($result)) 
    {$ID = $ligne['PersonID']; }//end while


    /// Trouver ID du futur item
    $sql = " SELECT MAX(ID) AS i FROM item";    
    $result = mysqli_query($connect, $sql);      
    if ($data = mysqli_fetch_assoc($result)) {
        $idSL = $data['i']+1;}
    

    // Insérer dans item
     $nom = mysqli_real_escape_string($connect, $_POST["nom"]);  
     $photo = mysqli_real_escape_string($connect, $_POST["photo"]);
     $description = mysqli_real_escape_string($connect, $_POST["description"]);  
     $prix = mysqli_real_escape_string($connect, $_POST["prix"]);  

    $query = "INSERT INTO item (ID, nom, description, prix, ID_ad) 
    VALUES('$idSL', '$nom', '$description', '$prix', '$ID')";  
    if(mysqli_query($connect, $query))  
    {echo '<script>alert("Item Registration Done")</script>';}

    $sql = " SELECT MAX(ID_image) AS m FROM image";    
    $result = mysqli_query($connect, $sql);      
    if ($data = mysqli_fetch_assoc($result)) {$Image = $data['m']+1;}

    // Inserer dans image
    $query = "INSERT INTO image(ID_image, lien, ID) VALUES('$Image', '$photo', '$idSL')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("Image Registration Done")</script>';}

    $type = mysqli_real_escape_string($connect, $_POST["type"]); 

    // Inserer dans Livre
    $query = "INSERT INTO sportloisir(ID, type, ID_sportloisir) VALUES('$idSL', '$type', '$idSL')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("Sport Registration Done")</script>';}


}
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Sport&Loisir</title>  
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
                echo '<label><a href="logoutA.php">Deconnexion</a></label>';  
                ?>  
           </div> 


           <div class="container" style="width:500px;">  
                <h3 align="center">Ajout : Sport et Loisirs</h3>  
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
                     <label>Genre</label> 
                     <input type="text" name="type" class="form-control" />  
                     <br />   
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                </form>  
           </div>  

      </body>  
 </html>  

 