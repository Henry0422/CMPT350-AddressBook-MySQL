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
			
			if($_POST['contact_id'] == ""){
				echo "<div class='alert alert-danger' role='alert'>403 Forbidden<br>
				 	You are not able to access updateContact.php directly</br>
					Automatically redirect to home page in 5 seconds</div>
					<a href='homePage.php' class='alert-link'>Go Home.</a>";
			}
			
			else{
				$sql = "Update AddressBook 
				SET firstname = '".$_POST['fname']."',
					lastname = '".$_POST['lname']."',
					company = '".$_POST['company']."',
					phone = '".$_POST['phone']."',
					email = '".$_POST['email']."',
					url = '".$_POST['url']."',
					address = '".$_POST['address']."',";
					
			if(!empty($_POST["birthday"])){
				$sql .= "birthday = '".$_POST['birthday']."',";
			}
					
			$sql .=	"add_date = '".$_POST['add_date']."'	
				WHERE id=".$_POST['contact_id'];
			

			if($conn->query($sql) == TRUE)
				echo "<div class='alert alert-success' role='alert'><h1>Contact ".$_POST['fname']." ".$_POST['lname']." has been updated</h1></br>You are being redirected
						  <a href='homePage.php' class='alert-link'>Home.</a>
						</div>";
			else
				echo "<div class='alert alert-danger' role='alert'>Error updating contact :".$conn->error."
						</div><a href='homePage.php' class='alert-link'>Go Home.</a>";
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