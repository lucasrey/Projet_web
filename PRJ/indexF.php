<?php  
 $connect = mysqli_connect("localhost", "root", "", "test");  
 session_start();

 if(isset($_SESSION["username"]))  
 {header("location:entryF.php");  }

if(isset($_POST["register"]))  
{ 
    
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
           $query = "SELECT v.photo, v.fond, p.nom, p.email FROM person p, vendeur v WHERE p.PersonID = v.ID AND v.pseudo = '$username'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if($password == $row["email"])  
                     {  
                          //return true;  
                          $_SESSION["username"] = $username;  
                          header("location:entryF.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("False")</script>';  
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
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">SESSION</h3>  
                <br />   
                <h3 align="center">Connexion : Vendeur</h3>  
                <br />  
                <form method="post">  
                     <label>Pseudo</label>  
                     <input type="password" name="username" class="form-control" />  
                     <br />  
                     <label>Email</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="index.html">Menu</a></p>  
                </form>   
           </div>  
      </body>  
 </html>   