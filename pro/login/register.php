<!DOCTYPE html>
<?php
$name=$email=$phone=$address=$state=$pass="";
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Register</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
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
		<form  action method="POST">
		<div class="login-box animated" style="margin-bottom:15%">
			<div class="box-header">
				<h2>Registration</h2>
			</div>
			<input type="text" name="name" placeholder="Name"><br>
			<input type="text" name="email" placeholder="E-Mail"><br>
			<input type="text" name="phone" placeholder="Mobile"><br>
			<input type="text" name="address" placeholder="Address"><br>
			<input type="text" name="state" placeholder="State"><br>
			<input type="password" name="pass" placeholder="Password"><br>
			<input type="password" name="pass1" placeholder="Confirm Password"><br>
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
if( isset($_POST['name'])){
$name=($_POST['name']);
$email=($_POST['email']);
$phone=($_POST['phone']);
$address=($_POST['address']);
$state=($_POST['state']);
$pass=(md5($_POST['pass']));
$sql=("insert into cust values('','$name','$email','$phone','$address','$state','$pass')");
if(mysqli_query($link,$sql)){
  echo "details saved successfully";
}else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}	
}

?>
</body>
</html>