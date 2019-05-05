<?php  
session_start();   
 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");  
 }  
 //entry.php   

 $email = $_SESSION["username"];

 $sql = "SELECT c.IDPerson FROM client c, person p where c.IDPerson = p.PersonID AND p.email = '$email'";
    $connect = mysqli_connect("localhost", "root", "", "test");  
    $result = mysqli_query($connect, $sql);  
    if(mysqli_num_rows($result) > 0)  
    {  
    while($ligne = mysqli_fetch_array($result))  
    {
   	$ID = $ligne['IDPerson'];
   }
    }

$query = "UPDATE item SET ID_cl = '$ID' WHERE statut = '1'";
if(mysqli_query($connect, $query)){
	echo '<script>alert("Commande validee : EN COURS")</script>';

}
?>