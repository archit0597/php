<!DOCTYPE html>
<?php
 if(isset($_POST['submit']))
 {
	 echo "test";

session_start();
$servername='localhost';
$username='root';
$password='';
$link = mysql_connect($servername,$username,$password);
if($link==false)
	die("connection failed". con-connect_error);
if (!mysql_select_db('cust', $link)) {
    echo 'Could not select database';
    exit;
}
$username = $_POST["username"];
$password = $_POST["password"];
$query = "SELECT * FROM cust WHERE custemail='$username' and custpass='$password'";
if(mysql_query($query,$link))
{
echo "<a href='register.php'></a>";
}
 }
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>WELCOME</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
<style>
body{
font-family: Roboto;
}
</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo" class="animated fadeInDown">Guitar <span>Store</span></span></h1>
			
		</div>
		<div class="login-box animated" style="margin-bottom:50px">
			<div class="box-header">
				<h2>Sign In</h2>
			</div>
			<input type="text" name="username" placeholder="Enter Email ID">
			<br/>
			<input type="password" name="password" placeholder="Enter Password">
			<br/>
			<button type="submit" name="submit">Sign In</button>
			<br/>
			<a href="register.php"><p class="small"><b>New User? Register</b></p></a>
		</div>
	</div>
</body>

<!--script>
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
</script-->
</html>