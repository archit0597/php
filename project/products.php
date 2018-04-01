<?php
   session_start();
   $_session["order_id"]="101";
   $_session["cust_id"]="100";
   $d=date("Y-m-d");
   $_session["order_date"]=$d;
   if(!isset($_SESSION["cart"]))
   $_SESSION["cart"]=array();
   
   if(isset($_GET["cart"])){
	  if(in_array($_GET["cart"],$_SESSION["cart"])!=""){ //already there in session array
		  //skip it
		  echo "Already in cart";
		  echo "<div id='myModal' class='modal'><div class='modal-content'><span class='close'><a href='/products.php'>&times;</a></span><p>Already Added in Cart.</p></div></div>";
	  }else{
		  array_push($_SESSION["cart"],$_GET["cart"]);
		  echo "Added to cart";
	  }
	  if($_GET["cart"]=="destroy")
		  session_destroy();
	  
	  print_r($_SESSION["cart"]); 
   }
?>
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
.atc{
margin-bottom:1em;
}
.already > div > .there{	
border: 0.5em solid rgba(120,220,120,0.99);
}
.there{
border: 0.5em solid rgba(220,220,220,0.99);	
}
.modal {
    display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
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
		if(in_array($row["pid"],$_SESSION["cart"])){
			echo "<div class='already'>";
		}
		echo '<div class="col-sm-3 col-xs-12"><div class="card maker there"><img class="image" src="pics/'.$row["pimgurl"].'.jpg" alt="'.$row["pbrand"].' '.$row["pmodel"].'"><div class="card-block exsp"><h4 class="card-title">'.$row["pbrand"].' '.$row["pmodel"].'</h4><p class="card-text">'.$row["ptype"]." ".$row["pprice"].'</p><input id="'.$row["pid"].'" type="button" onclick="cartFunc(this)" class="btn btn-success btn-sm atc" value="Add to Cart"></div></div></div>';
        if(in_array($row["pid"],$_SESSION["cart"])){
			echo "</div>";
		}
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
		document.location.href="products.php?cart="+object.id;
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