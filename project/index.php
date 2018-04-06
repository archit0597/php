<!DOCTYPE html>
<?php
session_start();
if (isset($_GET['session']) && $_GET['session']=="new"){
	unset($_SESSION["details"]);
	unset($_SESSION["cart"]);
}else{
	
}
$servername='localhost';
$username='root';
$password='';
$link = mysqli_connect($servername,$username,$password);
if($link==false){
die("connection failed". con-connect_error);exit;}
if (!mysqli_select_db($link,'gsms')) {
    echo 'Could not select database';
    exit;
}
if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST["username"];
$password = $_POST["password"];
$query1 =mysqli_query($link,"SELECT * FROM cust WHERE custemail='".$username."'");
$jf1 = mysqli_fetch_assoc($query1);
if($jf1["custid"]==""){
		echo " Invalid Credentialsl <a href='index.php'> Click here to redirect to Login </a>";
		unset($_POST['username']); 
		unset($_POST['password']);
		exit;
	}
else{	
	    echo "OOPS. ";
		if($jf1["custpass"]==($password)){
					
            $id = $jf1["custid"];
			//echo $id."lkoko1";
	        $query2=mysqli_query($link,"SELECT max(orderid) from orders;");
	        $jf2 = mysqli_fetch_assoc($query2);
	        $oid1 = $jf2["max(orderid)"];
			$oid2=(int)$oid1;
			$oid2=$oid2+1;
			$oid = (string)$oid2;
	        $d=date("Y-m-d");
	        $fin = array($id,$oid,$d);
            $_SESSION['details'] = $fin;
			print_r($_SESSION["details"]);
			echo "Correct";
			header("Location:products.php");
		}
	    else{
			echo "Invalid Credentials <a href='index.php'> Click here to redirect to Login </a>";
			unset($_POST['username']); 
			unset($_POST['password']);
			exit;
		}
	}
  }
   else{
     //echo "Unset";
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
			<form  method="POST">
			<input type="text" name="username" placeholder="Enter Email ID">
			<br/>
			<input type="password" name="password" placeholder="Enter Password">
			<br/>
			<b><span id="message" class="small"></span></b>
			<button type="submit">Sign In</button>
			<br/>
			</form>
			<a href="register.php"><p class="small"><b>New User? Register</b></p></a>
		</div>
	</div>
	
</body>
<script>

</script>
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