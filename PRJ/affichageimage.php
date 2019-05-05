       <?php  
 

$Nom= $_GET['nom'];
$Type = $_GET['type'];
$Description = $_GET['description'];
$Prix = $_GET['prix'];
$Couleur = $_GET['couleur'];
$Taille = $_GET['taille'];

echo $Nom;
echo $Type;
echo $Description;
echo $Prix;
echo $Couleur;
echo $Taille;

$connect = mysqli_connect("localhost", "root", "", "test");  

      $query = "SELECT distinct m.lien FROM item i, image m, vetement l, variation v WHERE i.ID = m.ID AND i.ID = l.ID_vetement AND i.nom = '$Nom' AND l.ID = v.ID_variation AND v.genre = 'Femme' AND i.ID_cl is not NULL AND i.statut is not NULL AND l.type = '$Type' AND v.couleur = '$Couleur' AND v.taille = '$Taille'"; 

           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                { 
                 // echo $Nom;
                  $lien = $row['lien'];
                  echo "<img src=".$lien.">";
   }
 }
       ?>