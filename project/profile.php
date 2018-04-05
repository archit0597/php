<html>
<?php
 session_start();
?>
<head>
<title>Profile</title>
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/pstyle.css">
</head>
<?php if(!isset($_SESSION["details"]))
   {
	   echo "<b>404 Invalid Request</b> ";
	   exit;
   } 
?>
<body>
<?php include 'navbar.php'?>

<div class="container">
  <div class="jumbotron jumbotron-fluid">
    <?php
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
//$query1 =mysqli_query($link,"SELECT * FROM cust WHERE custemail='".$username."'");
//$jf1 = mysqli_fetch_assoc($query1);
?>
	<ul style="list-style-type:none">
       
	   <li>Name</li>
	   <li>E-Mail</li>
	   <li>Phone</li>
	   <li>Address</li>
	   <li>State</li>	
	</ul>
	<table id="cart" class="table table-hover table-condensed" style="position: absolute; top: 220; bottom: 0; left: 0; right: 0; margin-top: 69px">
    				<thead>
						<tr>
							<th style="width:30%;  color:black">Product</th>
							<th style="width:10%; color:black">Quantity</th>
							<th style="width:8%; color:black">Order Status</th>
							<th style="width:22%; color:black" class="text-center">Total</th>
							<th style="width:10%"color:black" class="text-center">Order Date</th>
						</tr>
					</thead>
					
	<?php
	foreach ($_SESSION["cart"] as $x){
	$sql="select * from orders inner join order_items on orders.orderid = order_items.orderid inner join products on order_items.pid = products.pid";
	
	$result=mysqli_query($link,$sql);
	if($result){
	  while(($row = $result->fetch_assoc())) {
					echo '<tbody><tr id="temprow"><td data-th="Product"><div class="row"><div class="col-sm-2 hidden-xs">';
					//echo '<img src="pics/'.$row["pimgurl"].'.jpg" class="img-responsive"/></div>';
					echo '<div class="col-sm-10"><h4 class="nomargin">'.$row["pbrand"]." ".$row["pmodel"].'</h4></div></div>';
					echo '</td><td data-th="Price"><span  style="color=#000000" id="c'.$row["pid"].'">'.$row["quantity"].'</font></td><td data-th="Quantity">'; /*.$_SESSION["cartq"][$count].*/
					echo '</td><td data-th="Subtotal" class="text-center"><span style="color=#000000;" class="subtotal" id="b'.$row["pid"].'">'.$row["total"].'</span></td>';
					//echo '<button id="'.$row["pid"].'" class="btn btn-danger btn-sm" onclick="myfunc(this)"><i class="fa fa-trash-o"></i></button></td></tr></tbody>';
	  }
	}else{
	  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	}
	?>
	</table>
  </div>
</div>  
</body>
</html>