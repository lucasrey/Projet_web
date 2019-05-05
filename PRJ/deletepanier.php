<?php
$connect = mysqli_connect("localhost", "root", "", "test");  

$nom = $_GET['nom'];
echo '<script>alert("$nom")</script>';

$query = "UPDATE item SET statut = '0' WHERE nom = '$nom'";
//$query = "UPDATE item SET statut is NULL WHERE nom = '$nom'";
if(mysqli_query($connect, $query)){
	echo '<script>alert("artcicle suprime")</script>';
				echo "<a href='panierfinal.php'>Zoom</a>";

}
?>