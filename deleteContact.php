<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MySQL Online Contact</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
<!-- NAVBAR
================================================== -->
  <body>
  	<?php include_once("header.php"); ?>

    <div class="container">

      <!-- Three columns of text below the carousel -->
      <div class="row">
		<?php
			$servername="lovett.usask.ca";
			$username = "cmpt350_roh919";
			$dbname = "cmpt350_roh919";
			$password = "npig97rako";
			
			$conn = new mysqli($servername,$username,$password,$dbname);
			
			if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
			}
			
			if($_GET['ContactID'] == ""){
				echo "<div class='alert alert-danger' role='alert'>403 Forbidden</br>
				  Unable to delete undifined contact</br>
				  You are not able to access deleteContact.php directly</br>
				  Automatically redirect to home page in 5 seconds</div>
				 <a href='homePage.php' class='alert-link'>Go Home.</a>";
			}
			
			else{
				$id=$_GET['ContactID'];
				
				$select_sql="SELECT * From AddressBook WHERE id=".$id;
				$result = $conn->query($select_sql);
				$row = $result->fetch_assoc();
				
				
				$sql = "DELETE FROM AddressBook WHERE id=".$id;
					
				if($conn->query($sql) == TRUE)
					echo  "<div class='alert alert-success' role='alert'><h1>Contact ".$row["firstname"]." ".$row["lastname"]." has been Deleted!</h1> You are being redirected <a href='homePage.php' class='alert-link'>Home.</a></div>";
				else
					echo  "<div class='alert alert-danger' role='alert'>Error deleting contact :".$e->getMessage()."</div><a href='homePage.php' class='alert-link'>Go Home.</a>";
			}
	
			header("Refresh: 5; url=homePage.php");
		 ?> 
        
      </div><!-- /.row -->

      <!-- FOOTER -->
      <footer>
       
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>