
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "test");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:entry.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           
          $nom = mysqli_real_escape_string($connect, $_POST["nom"]);  
          $prenom = mysqli_real_escape_string($connect, $_POST["prenom"]);
          $email = mysqli_real_escape_string($connect, $_POST["email"]);  

          $sql = " SELECT MAX(PersonID) AS i FROM person";    
          $result = mysqli_query($connect, $sql);      
          if ($data = mysqli_fetch_assoc($result)) {   
          $idUserP = $data['i']+1;}

          $query = "INSERT INTO person(PersonID, nom, prenom, email) VALUES('$idUserP', '$nom', '$prenom', '$email')";  
           if(mysqli_query($connect, $query))  
           {echo '<script>alert("Registration Done")</script>';}  

 
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = password_hash($password, PASSWORD_DEFAULT);

           // Adresse
          $ad1 = mysqli_real_escape_string($connect, $_POST["ad1"]);  
          $ad2 = mysqli_real_escape_string($connect, $_POST["ad2"]);
          $ville = mysqli_real_escape_string($connect, $_POST["ville"]);  
          $codepostal = mysqli_real_escape_string($connect, $_POST["codepostal"]);  
          $pays = mysqli_real_escape_string($connect, $_POST["pays"]);
          $numeroportable = mysqli_real_escape_string($connect, $_POST["numeroportable"]); 

          //Mode de Paiement
          $typedecarte = mysqli_real_escape_string($connect, $_POST["typedecarte"]);  
          $numerodecarte = mysqli_real_escape_string($connect, $_POST["numerodecarte"]);
          $nomdecarte = mysqli_real_escape_string($connect, $_POST["nomdecarte"]);  
          $dateexpiration = mysqli_real_escape_string($connect, $_POST["dateexpiration"]);  
          $codedesecurite = mysqli_real_escape_string($connect, $_POST["codedesecurite"]);             


            $sql = " SELECT MAX(PersonID) AS i FROM client";    
            $result = mysqli_query($connect, $sql);      
            if ($data = mysqli_fetch_assoc($result)) {   
            $idUserC = $data['i']+1;}


           $query = "INSERT INTO client(PersonID, motdepasse, adresse1, adresse2, ville, codepostal, pays, numeroportable, typeCarte, numeroCarte, nomCarte, expirationCarte, codesecuriteCarte, IDPerson) VALUES('$idUserC', '$password', '$ad1', '$ad2', '$ville', '$codepostal', '$pays', '$numeroportable' ,'$typedecarte', '$numerodecarte', '$nomdecarte', '$dateexpiration', '$codedesecurite','$idUserP')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done (Client Table)")</script>';  
           }  
      }  
 }  
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $query = "SELECT c.motdepasse FROM client c, person p WHERE c.IDPerson = p.PersonID AND p.email = '$username'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["motdepasse"])) /// modifier à la place de password 
                     {  
                          //return true;  
                          $_SESSION["username"] = $username;  
                          header("location:entry.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SESSION</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Connection : Client</h3>  
                <br />  
                <?php  
                if(isset($_GET["action"]) == "login")  
                {  
                ?>  
                <h3 align="center">Identification</h3>  
                <br />  
                <form method="post">  
                     <label>Login(email)</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Mot de Passe</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="index.php">Inscription</a></p>  
                </form>  
                <?php       
                }  
                else  
                {  
                ?>  
                <h3 align="center">Inscription</h3>  
                <br />  
                <form method="post">
                     <label>Nom</label>  
                     <input type="text" name="nom" class="form-control" />  
                     <br />  
                     <label>Prenom</label>  
                     <input type="text" name="prenom" class="form-control" />  
                     <br />
                     <label>Email</label>  
                     <input type="text" name="email" class="form-control" />  
                     <br />

                     <!-- Table Client --> 

                     <label>Mot de Passe</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />


                     <label>Adresse Ligne 1</label>  
                     <input type="text" name="ad1" class="form-control" />  
                     <br />  
                     <label>Adresse Ligne 2</label>  
                     <input type="text" name="ad2" class="form-control" />  
                     <br />
                     <label>Ville</label>  
                     <input type="text" name="ville" class="form-control" />  
                     <br /> 
                     <label>Code Postale</label>  
                     <input type="text" name="codepostal" class="form-control" />  
                     <br /> 
                     <label>Pays</label>  
                     <input type="text" name="pays" class="form-control" />  
                     <br /> 
                     <label>Numero de Portable</label>  
                     <input type="text" name="numeroportable" class="form-control" />  
                     <br />


                    <!-- Mode de Paiement -->
                     <label>Type de Carte</label>  
                     <select name="typedecarte">
                     <option class="form-control" value="Visa">Visa</option>
                     <option class="form-control" value="MasterCard">MasterCard</option>
                     <option class="form-control" value="American Express">American Express</option>
                     <option class="form-control" value="PayPal">PayPal</option>
                     </select>
                  <!--   <label>Type de Carte</label>  
                     <input type="text" name="typedecarte" class="form-control" />  -->
                     <br />  
                     <label>Numero de Carte</label>  
                     <input type="text" name="numerodecarte" class="form-control" />  
                     <br />
                     <label>Nom sur la Carte</label>  
                     <input type="text" name="nomdecarte" class="form-control" />  
                     <br /> 
                     <label>Date d'Expiration</label>  
                     <input type="text" name="dateexpiration" class="form-control" />  
                     <br /> 
                     <label>Code de Sécurité</label>  
                     <input type="text" name="codedesecurite" class="form-control" />  
                     <br /> 


                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="index.php?action=login">Identification</a></p>  
                </form>  
                <?php  
                }  
                ?>  
           </div>  
      </body>  
 </html>  