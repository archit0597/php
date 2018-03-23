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
		<div	style="background-color: #ededed">
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

$sql=("select * from cust");
$result=mysqli_query($link,$sql);
if($result){
  echo "details saved successfully";
  while($row = $result->fetch_assoc()) {
        echo "id: " . $row["custid"]. " - Name: " . $row["custname"]. " " . "<br>";
    }
}else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}	
/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . "<br>";
    }
} else {
    echo "0 results";
}
*/
?>
		
		
		
		</div>
		

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

</body>
</html>