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


    // ID de la futur personne
    $sql = " SELECT MAX(PersonID) AS i FROM person";    
    $result = mysqli_query($connect, $sql);      
    if ($data = mysqli_fetch_assoc($result)) {
      $idPerson = $data['i']+1;}
    

    // Insérer dans item
     $nom = mysqli_real_escape_string($connect, $_POST["nom"]);  
     $prenom = mysqli_real_escape_string($connect, $_POST["prenom"]);
     $email = mysqli_real_escape_string($connect, $_POST["email"]);  

    $query = "INSERT INTO person (PersonID, nom, prenom, email) 
    VALUES('$idPerson', '$nom', '$prenom', '$email')";  
    if(mysqli_query($connect, $query))  
    {echo '<script>alert("Person Registration Done")</script>';}

    $pseudo = mysqli_real_escape_string($connect, $_POST["pseudo"]);
    $photo = mysqli_real_escape_string($connect, $_POST["photo"]); 
    $fond = mysqli_real_escape_string($connect, $_POST["fond"]);   

    // Inserer dans Livre
    $query = "INSERT INTO vendeur(PersonID, pseudo, photo, fond, ID, ID_ad) VALUES('$idPerson', '$pseudo', '$photo', '$fond', '$idPerson', '$ID')";  
    if(mysqli_query($connect, $query)){echo '<script>alert("vendeur Registration Done")</script>';}


}
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Vendeur</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />
           <!-- Infos sur l'utilisateur-->
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
                <h3 align="center">Ajout : Vendeur</h3>  
                <br />   
                <h3 align="center">Login</h3>  
                <br />  
                <form method="post"> 
                  <!-- placeholder="Pseudo" -->
                     <label>Username</label>  
                     <input type="text" value= "<?php echo $_SESSION["username"];?>" name="use" class="form-control" />  
                     <br /> 
                     <label>Nom</label>  
                     <input type="text" name="nom" class="form-control" />  
                     <br />  
                     <label>Prenom</label>  
                     <input type="text" name="prenom" class="form-control" />  
                     <br />
                     <label>Email</label> 
                     <input type="text" name="email" class="form-control" />  
                     <br />    
                     <label>Pseudo</label>  
                     <input type="text" name="pseudo" class="form-control" />  
                     <br />
                     <label>Photo</label> 
                     <input type="text" name="photo" class="form-control" />  
                     <br />  
                 <!--    <label>Fond</label>  
                     <input type="date" name="fond" class="form-control" />  
                     <br />  -->
                     <select name="fond">
                     <option value="#F08080">Light Coral</option>
                     <option value="#FA8072">Salmon</option>
                     <option value="#FFC0CB">Pink</option>
                     <option value="#FFA07A">Light Salmon</option>
                     <option value="#FFA500">Orange</option>
                     <option value="#FFD700">Gold</option>
                     <option value="#EEE8AA">Pale Goldenrod</option>
                     <option value="#F0E68C">Khaki</option>
                     <option value="#E6E6FA">Lavender</option>
                     <option value="#DCDCDC">Gainsboro</option>
                     <option value="#7FFFD4">Aquamarine</option>
                     <option value="#E0FFFF">Light Cyan</option>
                     <option value="#00FA9A">Medium Spring Green</option>
                     <option value="#98FB98">Pale Green</option>
                     <option value="#FFFFF0">Ivory</option>
                     <option value="#FAF0F5">Linen</option>
                     <option value="#FFFFFF">White</option>
                     </select>
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                  <!--   <p align="center"><a href="index.php">Register</a></p>-->
                </form>  
           </div>  

      </body>  
 </html>  

 