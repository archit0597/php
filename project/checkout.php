<?php
   session_start();
   if(!isset($_SESSION["cart"]))
   header("Location : index.php");
   if(!isset($_SESSION["details"]))
   header("Location : index.php");
   if(!isset($_SESSION["cartq"])){
   header("Location : index.php");}
    
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
	
	
	$custid=$_SESSION["details"][0];
	$orderid=$_SESSION["details"][1];
	$date=$_SESSION["details"][2];
	
		
			
		
		if(isset($_GET["confirm"])){
			
			if($_GET["confirm"]==md5($_SESSION["details"][2].$_SESSION["details"][1].$_SESSION["details"][0])){
				$sql3="update orders set ostatus='CONFIRMED' where orderid=".$orderid.";";
				$result3=mysqli_query($link,$sql3);
				if($result3){
				  echo "<a href='products.php'>Go to Home page</a>";
				  //session_destroy();
				  //header("Location : http://localhost/php/php/project/products.php");
				  
				  
				}else{
				  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				}	
			}
		}else{
			$sql1="delete from order_items where orderid='".$_SESSION["details"][1]."'";
			$result1=mysqli_query($link,$sql1);
			if($result1){
			}else{
			  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
			foreach($_SESSION["cart"] as $x){
			$subtotal=$_GET["".$x];
			$price=0;
			//Get Product Price for total
			$sql1="select * from products where pid='".$x."'";
			$result1=mysqli_query($link,$sql1);
			if($result1){
			  while(($row = $result1->fetch_assoc())) {
					$price=$row["pprice"];
			  }
			}else{
			  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
			//Execute Insert Query in order_items
			echo $orderid." ".$x." ".$subtotal/$price." ".$subtotal;
			$sql="insert into order_items(orderid,pid,quantity,total) values(".$orderid.",".$x.",".$subtotal/$price.",".$subtotal.");";
			$result=mysqli_query($link,$sql);
			if($result){
				//Do Nothing
			}else{
			  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	    }
		$sql2="insert into orders(orderid,custid,ostatus,odate) values(".$orderid.",".$custid.",'PROCESSING',".$date.");";
		$result2=mysqli_query($link,$sql2);
		if($result){
		  echo "<div id='process'>Processing Order</div>";
		}else{
		  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		}
  //print_r($_SESSION["cart"]); 
  //echo "<br>";
  //print_r($_SESSION["details"]);
  $GLOBALS["total"]=0; 
?>
<html>
<head>
<title>Checkout</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/cart.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
.big{
	width:20%;
	height:10%;
	margin-top:25%;
	
}
#process{
	color:white;
	text-decoration: underline;
}
.happen{
	background-color:#fafafa;
	width:100%;
	height:100%;
	display:none;
	margin: 0 auto;
	text-align:center;
}
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}
</style>
</head>

<body style="background-color:#fafafa; z-index:100;" >
<div id="loader">

</div>
<div id="confirm" class="happen">
		
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
$count=0;
	echo '<button id="'.md5($_SESSION["details"][2].$_SESSION["details"][1].$_SESSION["details"][0]).'" class="big btn btn-info btn-lg" onclick="myfunc(this)"><i class="fa fa-book"> Confirm</i></button>';
?>
				
				
</div>
</body>
<script>
function myfunc(object){
	document.location.href="checkout.php?confirm="+object.id;
}
function goto(str){
	document.location.href=str;
}
var myVar;
function myFunction() {
    myVar = setTimeout(showPage, 1500);
}
function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("process").style.display = "none";
  document.getElementById("confirm").style.display = "block";
}
window.onload = function(){ 
 myFunction();
}

</script>


</html>