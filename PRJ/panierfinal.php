<!DOCTYPE html> 
<html> 
<head>
		<title> EC E-Shop </title>  
 		<meta charset="utf-8">  
 		<meta name="viewport" content="width=device-width, initial-scale=1">   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
 		 
 		<script type="text/javascript">   
 			$(document).ready(function(){     
 				$('.header').height($(window).height());    
 			});  
 		</script> 

</head>

<body>

<div class="container">
    <div class="row">
    </div>
    <p>
        <br>
    </p>
 
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Votre panier</h5>
							</div>
							<div class="col-xs-6">
								<a href="index.html"><button type="button" class="btn btn-info btn-sm btn-block">
									<span class="glyphicon glyphicon-home"></span>  Continuer votre shopping
								</button></a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
				<?php
					//$query = "SELECT COUNT(ID) AS quantite FROM item WHERE nom = '$nom'";
				$connect = mysqli_connect("localhost", "root", "", "test");  

                $query = "SELECT SUM(prix) as total FROM item WHERE ID_cl is null and statut = '1'";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)  
           		{  
           	 	while($ligne = mysqli_fetch_array($result))  
                {
                		$total = $ligne['total'];

			                	}
                	}	

                	$query = "SELECT COUNT(ID) as quant FROM item  WHERE statut = '1' and ID_cl is null";
					$result = mysqli_query($connect, $query);  
           			if(mysqli_num_rows($result) > 0)  
           			{  
           	 		while($ligne = mysqli_fetch_array($result))  
                	{
                		$quant = $ligne['quant']-1;

                		if ($quant == 0) {
                			$quant = 1;
                		}
                		else
                		{
                			$quant = $ligne['quant']-1;

                		}
                	}
}

                	$query = "SELECT i.nom, i.prix, m.lien, i.description FROM item i, image m WHERE i.ID = m.ID AND i.ID_cl is null and i.statut = '1'";
					$result = mysqli_query($connect, $query);  
           			if(mysqli_num_rows($result) > 0)  
           			{  
           	 		while($ligne = mysqli_fetch_array($result))  
                	{
                		$nom = $ligne['nom'];
                	$prix = $ligne['prix']; 
                	$article = $ligne['nom'];
                	$lien = $ligne['lien'];	
                	$description = $ligne['description'];	
					echo "<div class=row>";
					echo "<div class=col-xs-2><img class=img-responsive src=".$lien." width=100 height=70>";
					echo "</div>";
					echo "<div class=col-xs-4>";//<?php echo $nom
					echo "<h4 class=product-name><strong>".$nom."</strong></h4><h4><small>".$description."</small></h4>";
					echo "</div>";
					echo "<div class=col-xs-6>";
						echo "<div class=col-xs-6 text-right>";
							echo "<h6><strong>".$prix."<span class=text-muted>x</span></strong></h6>";
						echo "</div>";
						echo "<div class=col-xs-4>";
							echo "<input type=text class=form-control input-sm value=".$quant.">";
 							echo "</div>";
 							
						 echo "<div class=col-xs-2>";
							
							echo "<button name=delete type=button class=btn btn-link btn-xs>";
								echo "<a href='deletepanier.php?nom=".$nom."'>X</a>";
								echo "<span class=glyphicon glyphicon-trash> </span>";
							echo "</button>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
				echo "<hr>";		
			echo "</div>";
										}
          		}
			echo "<div class=panel-footer>";
				echo "<div class=row text-center>";
					echo "<div class=col-xs-9>";
						echo "<h4 class=text-right>Total <strong>".$total."€</strong></h4>";
						echo "</div>";
						echo "<div class=col-xs-3>";
						echo "<a href='index.php'><button type=button class=btn btn-success btn-block>";
						   echo "Passer la commande";
						echo "</button></a>
						</div>
					</div>
				</div>
			</div>";
?>
		</div>
	</div>
</div>

</body>

</html>
