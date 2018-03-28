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
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<style>
body{
font-family: Roboto;
}
.image{
width:15em;
height:15em;
border-radius:50%;
	
	
}
.maker{
background-color: rgba(220,220,220,0.99);
padding: 5px 10px 5px 10px;
border-radius: 1px;
width: 100%;
height: auto;	
}
.somecont{

margin-left:5%;
margin-right:5%;
	
}
</style>
	</head>



<body>
	<div class="somecont">
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

$sql=("select * from products");
$result=mysqli_query($link,$sql);
if($result){
  echo "details saved successfully".$result->num_rows."<br>";
  $x=$result->num_rows;
  $val=($x/4) +1;
  $q=1;
  while(($row = $result->fetch_assoc()) && $val!=0) {
		if($q%4==1){
			echo "<div class='middle row text-center' style='margin-bottom:1rem;'>";
			echo '<div class="card-deck">';	
		}
		//echo '<div class="col-sm-3 col-xs-12"><div class="card"><img class="card-img-top" src="'.$row["pimgurl"].$row["pmodel"].$row["pbrand"].$row["pprice"].$row["ptype"];
		echo '<div class="col-sm-3 col-xs-12"><div class="card maker"><img class="image" src="../../pics/'.$row["pimgurl"].'.jpg" alt="'.$row["pbrand"].' '.$row["pmodel"].'"><div class="card-block exsp"><h4 class="card-title">'.$row["pbrand"].' '.$row["pmodel"].'</h4><p class="card-text">'.$row["ptype"]." ".$row["pprice"].'</p><br><input style="margin-top:-4em;" id="'.$row["pid"].'" type="button" onclick="cartFunc(this)" class="btn btn-success btn-sm" value="Add to Cart"></div></div></div>';
        if($q%4==0){
				echo "</div></div>";
				$val=$val-1;
		}
		$q=$q+1;
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
	function cartFunc(object){
		alert(object.id);
	}
	
	
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