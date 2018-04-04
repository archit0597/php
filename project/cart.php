<?php
   session_start();
   if(!isset($_SESSION["cart"]))
   $_SESSION["cart"]=array();
   if(!isset($_SESSION["cartq"])){
	$_SESSION["cartq"]=array();
	foreach($_SESSION["cart"] as $x){
		array_push($_SESSION["cartq"],"1");
	}
   }
   if(isset($_GET["del"])){
	  if(in_array($_GET["del"],$_SESSION["cart"])){ //already there in session array
		unset($_SESSION["cart"][array_search($_GET["del"],$_SESSION["cart"])]);
	  }
   }
	  
  print_r($_SESSION["cart"]); 
  echo "<br>";
  print_r($_SESSION["details"]);
  $GLOBALS["total"]=0; 
?>
<html>
<head>
<title>Cart</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/cart.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div id="welcome">
    <p>WELCOME</p>
	<form method="POST">
	    
	</form>
</div>
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					
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
foreach ($_SESSION["cart"] as $x){
	$sql="select * from products where pid='".$x."'";
	$result=mysqli_query($link,$sql);
	if($result){
	  while(($row = $result->fetch_assoc())) {
					echo '<tbody><tr id="temprow"><td data-th="Product"><div class="row"><div class="col-sm-2 hidden-xs">';
					echo '<img src="pics/'.$row["pimgurl"].'.jpg" class="img-responsive"/></div>';
					echo '<div class="col-sm-10"><h4 class="nomargin">'.$row["pbrand"]." ".$row["pmodel"].'</h4></div></div>';
					echo '</td><td data-th="Price"><span  style="color=#000000" id="c'.$row["pid"].'">'.$row["pprice"].'</font></td><td data-th="Quantity"><input id="a'.$row["pid"].'" type="number" class="form-control text-center" min="1" max="10" value="'."1".'">'; /*.$_SESSION["cartq"][$count].*/
					echo '</td><td data-th="Subtotal" class="text-center"><span style="color=#000000;" class="subtotal" id="b'.$row["pid"].'">'.$row["pprice"].'</span></td><td class="actions" data-th="">';
					echo '<button id="'.$row["pid"].'" class="btn btn-danger btn-sm" onclick="myfunc(this)"><i class="fa fa-trash-o"></i></button></td></tr></tbody>';
	  }
	}else{
	  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	$count++;	
}
			$sql1="delete from order_items where orderid='".$_SESSION["details"][1]."'";
			$result1=mysqli_query($link,$sql1);
			if($result1){
			}else{
			  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
			
?>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total 1.99</strong></td>
						</tr>
						<tr>
							<td><a href="products.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong><span id="totalfield">0</span>.00</strong></td>
							<td><button class="btn btn-warning" onclick="buy()">Checkout<i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
				
</div>
</body>
<?php

echo '<script>';
	echo 'function updatetotal(){var arr=document.getElementsByClassName("subtotal");var i,total=0;for (i = 0; i < arr.length; i++) {total+=parseFloat(arr[i].innerHTML);}document.getElementById("totalfield").innerHTML=total;}';
	$count=0;
	foreach($_SESSION["cart"] as $x){
		echo '$("#a'.$x.'").bind("keyup mouseup", function () {document.getElementById("b'.$x.'").innerHTML=parseFloat($(this).val()*document.getElementById("c'.$x.'").innerHTML); updatetotal();});';	
	}
	

echo '</script>';
?>
<script>
function myfunc(object){
	document.location.href="cart.php?del="+object.id;
}
function buy(){
	var arr=document.getElementsByClassName("subtotal");
	var i; var str="checkout.php?";
	for( i=0; i<arr.length;i++){
		str=str+arr[i].id.substring(1)+"="+arr[i].innerHTML+"&";
	}
	document.location.href=str;
}
window.onload = function(){ 
    updatetotal(); 
}
</script>


</html>