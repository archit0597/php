
<?php
/*
session_start();
if(!file_exists("config.php") || !include_once "config.php"){
           header("Location: install.php");
 }
if (!defined('posnicEntry')) {
    define('posnicEntry', true);
}
if(isset($_SESSION['username'])) {
    if($_SESSION['usertype'] =='admin') // if session variable "username" does not exist.
	header("Location: dashboard.php"); // Re-direct to index.php
}
*/
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Login to Control Panel</title>
	
	<!-- Stylesheets -->
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/cmxform.css">
	<link rel="stylesheet" href="js/lib/validationEngine.jquery.css">
	
	<!-- Scripts -->
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
	
	<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	
	$(document).ready(function() {
		
		// validate signup form on keyup and submit
		$("#login-form").validate({
			rules: {
				username: {
					required: true,
					minlength: 3
				},
				password: {
					required: true,
					minlength: 3
				}
			},
			messages: {
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 3 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 3 characters long"
				}
			}
		});
	
	});

	</script>

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width">
		
			<!--<a href="#" class="round button dark ic-left-arrow image-left ">See shortcuts</a>-->

		</div> <!-- end full-width -->	
	
	</div> 
	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl">
			
				<h1>Login to Dashboard</h1>
				<h5>Enter your credentials below</h5>
			
			</div> <!-- login-intro -->

			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="http://posnic.com/" id="company-branding" class="fr"  target="blank"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	<!-- MAIN CONTENT -->

	<div id="content">

		<form action="checklogin.php" method="POST" id="login-form" class="cmxform" autocomplete="off">
		
			<fieldset>
				<p>
					<label>
						<h1 style="font-family: Georgia; font-weight: bold; font-size:20px; color: green;" align="center">
							POSNIC - Point of Sale
						</h1>
					</label>
				</p>
				<p> <?php 
				/*
				if(isset($_REQUEST['msg']) && isset($_REQUEST['type']) ) {
					
					if($_REQUEST['type'] == "error")
						$msg = "<div class='error-box round'>".$_REQUEST['msg']."</div>";
					else if($_REQUEST['type'] == "warning")
						$msg = "<div class='warning-box round'>".$_REQUEST['msg']."</div>"; 
					else if($_REQUEST['type'] == "confirmation")
						$msg = "<div class='confirmation-box round'>".$_REQUEST['msg']."</div>"; 
					else if($_REQUEST['type'] == "information")
						$msg = "<div class='information-box round'>".$_REQUEST['msg']."</div>"; 	
						
					echo $msg;						
				}
				*/
				?>
				
				</p>
				<p>
                                    <label>Username</label>
                                        <input type="text" id="login-username" class="round full-width-input" placeholder="Enter Username" name="username" autofocus  />
				</p>

				<p>
                                <label>Password</label>
                                        <input type="password" id="login-password" name="password" placeholder="Enter Password" class="round full-width-input"  />
				</p>
				
                                <a href="forget_pass.php" class="button ">Forgot your password?</a>
				
				<!--<a href="dashboard.php" class="button round blue image-right ic-right-arrow">LOG IN</a>-->
				<input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="LOG IN" />
			</fieldset>

			<br/>
                        
                </form>

	</div> <!-- end content -->
<!-- There are some issue-->

<?php

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "gsms";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }

$conn = OpenCon();
echo "Connected Successfully"; 
 

$result=mysqli_query($conn,"select custname,custid from cust");
while($row=mysqli_fetch_array($result))
{
         echo $row['custname'].' '.$row['custid'].'<br/>';
 }
 CloseCon($conn); 
//Add the SQL Query code
?>

</body>
</html>
