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
	<?php include_once("navbar.php");?>
	<?php include_once("header.php"); ?>
    
    <div class="container-fluid">

      <!-- Three columns of text below the carousel -->
      <div class="row">
		<div class="col-lg-3"  >
			<div class="panel panel-default">
				<div class="panel-heading text-center" style='color:white;'>
					<h4>Add a Contact</h4>
				</div>
				<div class="panel-body">
					<div id="error">
					Please check for errors!
				</div>
				  <form class="form-horizontal" action="addContact.php" onsubmit="return validForm()" method="post" >
					<div class="form-group">
					  <label for="fname" class="col-xs-3">First Name:</label>
					  <div class=" col-xs-8">
						<input type="text" class="form-control" name="fname" id="fname" placeholder="Enter first name">
					  </div>
					</div>
					<div class="form-group">
					  <label for="lname" class="col-xs-3">Last Name:</label>
					  <div class=" col-xs-8">
					  <input type="text" class="form-control" name="lname"id="lname" placeholder="Enter last name">
					</div></div>
					<div class="form-group">
					  <label for="company" class="col-xs-3">Company:</label>
					  <div class=" col-xs-8">
					  <input type="text" class="form-control" name="company"id="company" placeholder="Enter company name">
					</div></div>
					<div class="form-group">
					  <label for="phone" class="col-xs-3">Phone:</label>
					  <div class=" col-xs-8">
					  <input type="number" class="form-control" name="phone"id="phone" placeholder="Enter phone">
					</div></div>
					<div class="form-group">
					  <label for="email" class="col-xs-3">Email:</label>
					  <div class=" col-xs-8">
					  <input type="email" class="form-control" name="email"id="email" placeholder="Enter email">
					</div></div>
					<div class="form-group">
					  <label for="url" class="col-xs-3">URL:</label>
					  <div class=" col-xs-8">
					  <input type="text" class="form-control"name="url"id="url" placeholder="Enter URL">
					</div></div>
					<div class="form-group">
					  <label for="address" class="col-xs-3">Address:</label>
					  <div class=" col-xs-8">
					  <input type="text" class="form-control"name="address"id="address" placeholder="Enter address">
					</div></div>
					<div class="form-group">
					  <label for="brithday" class="col-xs-3">Birthday:</label>
					  <div class="col-xs-8">
					  <input type="date" class="form-control"name="birthday"id="birthday" >
					</div></div>
					<div class="form-group">
					  <label for="add_date" class="col-xs-3">Date:</label>
					  <div class=" col-xs-8">
					  <input type="date" class="form-control"name="add_date"id="add_date" >
					</div></div>
					<div class="form-group">
					  <label for="note" class="col-xs-3">Notes:</label>
					  <div class=" col-xs-8">
					  <input type="text" class="form-control"name="note"id="note" placeholder="Enter a note">
					</div></div>
					<div class="cl-xs-12">
						<button class="btn btn-block btn-primary" type="submit" id="submit" >Submit</button>
					</div>
					
				  </form>
				</div>
			</div>
		
        </div><!-- /.col-lg-3 -->
		
		<?php
			$servername="lovett.usask.ca";
			$username = "cmpt350_roh919";
			$dbname = "cmpt350_roh919";
			$password = "npig97rako";
			
			$conn = new mysqli($servername,$username,$password,$dbname);
			
			if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
			}
			
			$sql= "SELECT * FROM AddressBook";
			$result = $conn->query($sql);
			$ctr = 1;
			
			if($result->num_rows > 0){
			echo "<div class='col-lg-9'>";
				while($row = $result->fetch_assoc()){
					if($ctr == 1){
						echo	"
							
								<div class='row'>
									<div class='col-lg-4 '>
										<div class='panel panel-default'  >
											<div class='panel-heading text-center' style='color:white;'>
												<h4>".$row["firstname"]." ".$row["lastname"]."</h4>
											</div>
											<div class='panel-body'>
												<p>Company: ".$row["company"]."</p>
												<p>Phone: ".$row["phone"]."</p>
												<p>Email: ".$row["email"]."</p>
												<p>URL: ".$row["url"]."</p>
												<p>Address: ".$row["address"]."</p>
												<p>Birthday: ".$row["birthday"]."</p>
												<p>Date: ".$row["add_date"]."</p>
												<p>Note: ".$row["note"]."</p>
											</div>
											<div class='panel-footer'>
												<a class='btn btn-primary btn-block' href='updatePage.php?ContactID=".$row["id"]."'>
													Update
												</a>
												<a class='btn btn-danger btn-block' href='deleteContact.php?ContactID=".$row["id"]."' 
													onclick='return confirm(\"Would you like to delete ".$row["firstname"]." ".$row["lastname"]." from Online Contact?\")'>
													Delete
												</a>
											</div>
										</div>
									</div>
								";
						$ctr ++;
					}else{
						echo	"
									<div class='col-lg-4'>
										<div class='panel panel-default'  >
											<div class='panel-heading text-center' style='color:white;'>
												<h4>".$row["firstname"]." ".$row["lastname"]."</h4>
											</div>
											<div class='panel-body'>
												<p>Company: ".$row["company"]."</p>
												<p>Phone: ".$row["phone"]."</p>
												<p>Email: ".$row["email"]."</p>
												<p>URL: ".$row["url"]."</p>
												<p>Address: ".$row["address"]."</p>
												<p>Birthday: ".$row["birthday"]."</p>
												<p>Date: ".$row["add_date"]."</p>
												<p>Note: ".$row["note"]."</p>
											</div>
											<div class='panel-footer'>
												
												<a class='btn btn-primary btn-block' href='updatePage.php?ContactID=".$row["id"]."'>
													Update
												</a>
												<a class='btn btn-danger btn-block' href='deleteContact.php?ContactID=".$row["id"]."' 
													onclick='return confirm(\"Would you like to delete ".$row["firstname"]." ".$row["lastname"]." from Online Contact?\")'>
													Delete
												</a>
											</div>
										</div>
									</div>";
						if($ctr == 3){
							$ctr = 1;
							echo "</div><div class='row' style='padding: 5px'></div>";
						}else{
							$ctr ++;
						}
							
					}//end inside if
				} //endWhile
				echo "</div>";
			} //end main if
			
		 ?> 
		   
      </div><!-- /.row -->

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
				$('#error').hide();
	
 
			function validForm(){
				var nameReg = /^[A-Za-z]+$/;
				var ccReg = /^[0-9]{16}$/;
				var dateReg = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;
				var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,9}$/;
				var urlReg = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;

				var fname = $('#fname').val();
				var lname = $('#lname').val();
				var company = $('#company').val();
				var phone = $('#phone').val();
				var email = $('#email').val();
				var url = $('#url').val();
				var address = $('#address').val();
				var birthday = $('#birthday').val();
				var addDate = $('#add_date').val();
				var note = $('note').val();
				
				var err = false;
				$('.error').hide();
				$('#error').hide();

				if(fname == "" || fname == null){
					$('#error').after('<div class="error"> Please enter the first name</div>');
					$('#fname').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				else if(!nameReg.test(fname)){
					$('#error').after('<div class="error">Letters only</div>');
					$('#fname').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}

				if(lname == ""|| lname == null){
					$('#error').after('<div class="error"> Please enter the last name</div>');
					$('#lname').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				else if(!nameReg.test(lname)){
					$('#error').after('<div class="error"> Letters only</div>');
					$('#lname').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}

				if(email == ""){
					$('#error').after('<div class="error"> Please enter the email</div>');
					$('#email').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				else if(!emailReg.test(email)){
					$('#error').after('<div class="error"> You need a valid email address like: abc123@gmail.com</div>');
					$('#email').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				
				if( (url != "") && (!urlReg.test(url)) ){
					$('#error').after('<div class="error"> You need a valid url</div>');
					$('#url').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				
				if(phone == ""){
					$('#error').after('<div class="error"> Please enter phone number</div>');
					$('#phone').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				
				if( (birthday != "") && (!dateReg.test(birthday)) ){
					$('#error').after('<div class="error"> You need a valid birthday, YYYY-MM-DD only </div>');
					$('#birthday').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				
				if(addDate == ""){
					$('#error').after('<div class="error"> Please enter add contact date</div>');
					$('#add_date').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				else if(!dateReg.test(addDate)){
					$('#error').after('<div class="error">You need a valid add contact date,YYYY-MM-DD only</div>');
					$('#add_date').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				
				return !err;
			}
		</script>
  </body>
</html>