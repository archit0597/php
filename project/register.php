<!DOCTYPE html>
<?php
$nameErr=$emailErr=$phoneErr=$addressErr=$stateErr=$passErr=$cpassErr="";
$name=$email=$phone=$address=$state=$pass=$pass1="";
session_start();
$_SESSION["okay"]="yes";
	if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		if(isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["pass1"])){
			if(empty($_POST["email"])) {
               $emailErr = "Email is required";
			   $_SESSION["okay"]="no";
            }else {
               $email = test_input($_POST["email"]);
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format";
					$_SESSION["okay"]="no";
               }
            }		
			if (empty(test_input($_POST["pass"]))) {
               $passErr = "password is required";
			   $_SESSION["okay"]="no";
            }
			if (empty(test_input($_POST["pass1"]))) {
               $cpassErr = "confirm the password";
			   $_SESSION["okay"]="no";
            }
			else if($_POST['pass']!=$_POST["pass1"]){
				$cpassErr="password did not match";
			    $_SESSION["okay"]="no";
			}
		}
		
	}
 		   function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
		}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<style>
body{
font-family: Roboto;
}
</style>
	</head>
<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Guitar <span>Store</span></span></h1>
		</div>
		<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="login-box animated" style="margin-bottom:15%">
			<div class="box-header">
				<h2>Registration</h2>
			</div>
			<span class="error">* <?php echo $nameErr;?></span>
			<input type="text" name="name" placeholder="Name" value="<?php echo $name;?>"><br>
			<span class="error">* <?php echo $emailErr;?></span>
			<input type="text" name="email" placeholder="E-Mail" value="<?php echo $email;?>"><br>
			<span class="error">* <?php echo $phoneErr;?></span>
			<input type="text" name="phone" placeholder="Mobile" value="<?php echo $phone;?>"><br>
			<span class="error">* <?php echo $addressErr;?></span>
			<input type="text" name="address" placeholder="Address" value="<?php echo $address;?>"><br>
			<span class="error">* <?php echo $stateErr;?></span>
			<input type="text" name="state" placeholder="State" value="<?php echo $state;?>"><br>
            <span class="error">* <?php echo $passErr;?></span>
			<input type="password" name="pass" placeholder="Password" value="<?php echo $pass;?>"><br>
			<span class="error">* <?php echo $cpassErr;?></span>
			<input type="password" name="pass1" placeholder="Confirm Password" value="<?php echo $pass1;?>"><br>
			<button type="submit">Register</button>
			<br/>
		</div>
	</div>
	</form>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>
<?php
$servername="localhost";
$username="root";
$password="";
$link=mysqli_connect($servername,$username,$password);
if($link==false)
    die("connection failed" . con-connect_error);
if(!mysqli_select_db($link,'gsms')){
   echo 'Could not select database';
   exit;
}	
if(isset($_POST['name']) && $_SESSION["okay"]=="yes"){
$name=($_POST['name']);
$email=($_POST['email']);
$phone=($_POST['phone']);
$address=($_POST['address']);
$state=($_POST['state']);
$pass=(md5($_POST['pass']));
$sql=("insert into cust values('','$name','$email','$pass','$phone','$address','$state')");
if(mysqli_query($link,$sql)){
  echo "details saved successfully";
}else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}	
}
?>
</body>
</html>