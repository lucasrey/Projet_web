<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:indexF.php?action=login");  
 } 


 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | PHP Login Registration Script by using password_hash() method</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head> 
      <body> 
   <!--   <body style="background: <?php echo $strBackgroundColor; ?>;"> -->
           <br /><br />  
           <div class="container" style="width:500px;"> 
          
                <h3 align="center">PHP Login Registration Script by using password_hash() method</h3>  
                <br />  
                <?php  
                echo '<h1>Welcome - '.$_SESSION["username"].'</h1>';  
                echo '<label><a href="logoutF.php">Logout</a></label>';
                ?>  


                </form>
           </div>  
      </body>  
 </html>  









