<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");  
 }  
$email = $_SESSION["username"];
  if(isset($_POST["payer"]))  
 {  
     // if(empty($_POST["typedecarte"]) || empty($_POST["nomcarte"]) || empty($_POST["numerocarte"]) || empty($_POST["cvv"]) || empty($_POST["dateexp"]))  
    //  {  
          // echo '<script>alert("Both Fields are required")</script>';  
   //   }  
   //   else  
   //   {  
  /*  $email = $_SESSION["username"];
    $sql = "SELECT c.IDPerson FROM client c, person p where p.IDPerson = c.PersonID AND p.email = '$email'";
    $connect = mysqli_connect("localhost", "root", "", "test");  
    $result = mysqli_query($connect, $sql);  
    if(mysqli_num_rows($result) > 0)  
    {  
    while($ligne = mysqli_fetch_array($result))  
    {
    $ID = $ligne['IDPerson'];
   }
    }
    $query = "UPDATE client SET typeCarte = '$typecarte', numeroCarte = '$numerocarte', nomCarte='$nomcarte', expirationCarte = '$dateexp', codesecuriteCarte = '$cvv'  WHERE PersonID = '$nom'";
    $connect = mysqli_connect("localhost", "root", "", "test");  
    if(mysqli_query($connect, $query))  
    {echo '<script>alert("Bank Information registrated")</script>';}
echo "<a href=validation.php></a></button>";*/


//}

  $sql = "SELECT c.typeCarte, c.numeroCarte, c.nomCarte, c.nomCarte, c.expirationCarte, c.codesecuriteCarte  FROM client c, person p where c.IDPerson = p.PersonID AND p.email = '$email'";
    $connect = mysqli_connect("localhost", "root", "", "test");  
    $result = mysqli_query($connect, $sql);  
    if(mysqli_num_rows($result) > 0)  
    {  
    while($ligne = mysqli_fetch_array($result))  
    {
    $typeCarte = $ligne['typeCarte'];
    $numeroCarte = $ligne['numeroCarte'];
    $numeroCarte = $ligne['numeroCarte'];
    $nomCarte = $ligne['nomCarte'];
    $expirationCarte = $ligne['expirationCarte'];
    $codesecuriteCarte = $ligne['codesecuriteCarte'];
    if ($typeCarte=="typecarte") {
    {echo '<script>alert("Bank Information registrated")</script>';
    }
}

}

}






}

 ?>

<!DOCTYPE html> 
<html> 
<head>
		<title> EC E-Shop </title>  
 		<meta charset="utf-8">  
 		<meta name="viewport" content="width=device-width, initial-scale=1">   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">
 		 
 		<script type="text/javascript">   
 			$(document).ready(function(){     
 				$('.header').height($(window).height());    
 			});  
 		</script> 

</head>

<body>
<div class="container wrapper">

                <?php  
                echo '<h1>Bienvenue - '.$_SESSION["username"].'</h1>';  
                echo '<label><a href="logout.php">Logout</a></label>';
                $email = $_SESSION["username"];
                $sql = "SELECT p.nom, p.prenom, c.adresse1, c.adresse2, c.ville, c.codepostal, c.pays, c.numeroportable FROM client c, person p WHERE p.PersonID = c.IDPerson AND p.email = '$email'";
                 $connect = mysqli_connect("localhost", "root", "", "test");  
                $result = mysqli_query($connect, $sql);  
                if(mysqli_num_rows($result) > 0)  
           			{  
           	 		while($ligne = mysqli_fetch_array($result))  
                	{
                		$nom = $ligne['nom'];
                		$prenom= $ligne['prenom'];
                		$adresse1 = $ligne['adresse1'];
                		$adresse2 = $ligne['adresse2'];
                		$codepostal = $ligne['codepostal'];
                		$ville = $ligne['ville'];
                		$pays = $ligne['pays'];
                		$numeroportable = $ligne['numeroportable'];
                	}
                }
?>
                <div class="row">
                    <p></p>
                </div>
               
                
            <div class="row">
                <form method="post" >
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <p></p>
       </div>
            
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                  
                    <div class="panel panel-info">
                        <div class="panel-heading">Adresse</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Adresse de livraison</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong><label for="Pays"> Pays: </label></strong></div>
                                <div class="col-md-12">
                                <input type="text" name="pays" value = "<?php echo $pays?>"id="pays" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong><label for="nom">Nom:</label></strong>
                                    <input type="text" name="nom" id="nom" value="<?php echo $nom?>"class="form-control" />
                                    
                                    
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                   <strong><label for="prenom">Prénom:</label></strong>
                                    <input type="text" name="prenom" value="<?php echo $prenom?>" class="form-control" id="prenom" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong><label for="adresse">Adresse:</label></strong>
                                    <input type="text" name="adresse" value="<?php echo $adresse1?>"id="adresse" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong><label for="adresse2">Complement d'adresse :</label></strong>
                                    <input type="text" name="adresse2" value="<?php echo $adresse2?>"id="adresse2" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong><label for="ville">Ville :</label></strong>
                                    <input type="text" name="ville" value="<?php echo $ville?>"id="ville" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong><label for="codepostal">Code Postal :</label></strong>
                                    <input type="text" name="codepostal" value="<?php echo $codepostal?>"id="codepostal" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                <strong><label for="numero">Numéro de téléphone:</label></strong>
                                    <input type="text" name="numero" value="<?php echo $numeroportable?>"id="numero" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Payer</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">

                                    <label for="typedecarte"> Type de carte : </label>
       <select name="typedecarte" id="typedecarte" class="form-control">
           <option value="visa"> Visa </option>
           <option value="mastercard"> Mastercard </option>
           <option value="americanexpress"> American Express</option>
           <option value="americanexpress"> Paypal</option>
          </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong><label for="numerocarte">Numéro de Carte:</label></strong>
                                    <input type="text" name="numerocarte" id="numerocarte" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong><label for="nomcarte">Nom de Carte:</label></strong>
                                    <input type="text" name="numerocarte" id="nomcarte" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong><label for="cvv">CVV:</label></strong>
                                    <input type="text" name="cvv" id="cvv" class="form-control" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong><label for="dateexp">Date d'expiration</label></strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="mois">
                                        <option value="">Mois</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="annee">
                                        <option value="">Année</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                </select>
                                </div>
                            </div>
                            <div class="row"></div>
                            <p></p>
                            
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
<!--                                <?php 

  if(isset($_POST["login"]))  
 {
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");  
 } 
    $email = $_SESSION["username"];
    $sql = "SELECT c.IDPerson FROM client c, person p where p.IDPerson = c.PersonID AND p.email = '$email'";
    $connect = mysqli_connect("localhost", "root", "", "test");  
    $result = mysqli_query($connect, $sql);  
    if(mysqli_num_rows($result) > 0)  
    {  
    while($ligne = mysqli_fetch_array($result))  
    {
   	$ID = $ligne['IDPerson'];
   }
    }
    $query = "UPDATE client SET typeCarte = '$typecarte', numeroCarte = '$numerocarte', nomCarte='$nomcarte', expirationCarte = '$dateexp', codesecuriteCarte = '$cvv'  WHERE PersonID = '$nom'";
    $connect = mysqli_connect("localhost", "root", "", "test");  
    if(mysqli_query($connect, $query))  
    {echo '<script>alert("Bank Information registrated")</script>';}
  echo "<a href=validation.php>Payer</a></button>";

}
 ?>-->
                                  <!--  <button type="submit" name="payer" class="btn btn-primary btn-submit-fix">Payer</button>
                                    <a href="validation.php">Payer</a></button>-->
                                    <input type="submit" name="payer" value="payer" class="btn btn-info" />  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                </form>
            </div>
    </div> 

</body>

</html>
