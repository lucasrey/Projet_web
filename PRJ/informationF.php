<?php  
 //entry.php  
$connect = mysqli_connect("localhost", "root", "", "test");  
//session_start();
 $utilisateur = $_SESSION["username"];  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:indexF.php?action=login");  
 }
      $query = "SELECT v.photo, v.fond, p.nom, p.email FROM person p, vendeur v WHERE p.PersonID = v.ID AND v.pseudo = '$utilisateur'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                { 
                //$Nom =  $row['nom'];



?>
<body style="background: <?php echo $row['fond']; ?>;">
<center>
  <p></p>
  <p></p>
<img id="ad" src="<?php echo $row['photo'];?>"/>
<?php echo $row['nom'];?>
</center>
</body>
<?php
}
}

 ?>  
 