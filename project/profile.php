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
<style>
.asd{
	
}
</style>
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
  <div class="jumbotron jumbotron-fluid" style="margin-top:10px;">
<?php
    echo "<center><h2> My Profile </h2></center><br>";
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
	$cid=$_SESSION["details"][0];
	$sql="select * from cust where custid='".$cid."'";
	$result=mysqli_query($link,$sql);
	if($result){
	  while(($row = $result->fetch_assoc())) {
		  echo "<div style='asd'><h3>".$row["custname"]." <br>".$row["custemail"]."<br>".$row["custphone"]."<br>Address :".$row["custaddress"].",".$row["custstate"]."</h3></div>";
	  }
	}else{
	  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
?>
	<!--ul style="list-style-type:none">
       
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
					</thead-->
					</div>
	<div class="jumbotron jumbotron-fluid">				
	<?php
	echo "<center><h2> My Orders </h2></center><br>";
	$sql="select o.orderid 'orderid' , o.ostatus 'ostatus', o.odate 'odate', oi.pid 'pid', products.pmodel 'pmodel', products.pprice 'pprice' ,products.pbrand 'pbrand', products.pimgurl 'pimgurl', oi.quantity 'q', oi.total 'total' from orders o ,order_items oi,products where oi.orderid=o.orderid and o.custid='".$cid."' and products.pid=oi.pid";
	$result=mysqli_query($link,$sql);
	$dummy=0;
	if($result){
			if($result->num_rows==0){
				echo "<b>You have no orders.</b><hr><br>";
			}else
	  while(($row = $result->fetch_assoc())) {
					if($dummy==0){
						$dummy=$row["orderid"];
							
							echo '<hr><h3>Order Details </h3><h4>OrderID: '.$row["orderid"]." &nbsp; | Status: ".$row["ostatus"].' &nbsp; | Order Date: '.$row["odate"].'</h4>';
					}else{
						if($row["orderid"]==$dummy){
							//echo '<hr>';
						}else{
							echo '<hr><h3>Order Details </h3><h4>OrderID: '.$row["orderid"]." &nbsp; | Status: ".$row["ostatus"].' &nbsp; | Order Date: '.$row["odate"].'</h4>';
							$dummy=$row["orderid"];
						}
					}
					
					echo '<div style="border: 1px dotted #fafafa;"><img src="pics/'.$row["pimgurl"].'.jpg" class="img-responsive" style="margin-right:20px; float: left;height: 100px; width: 100px;"/>'; //echo '<br>';
					echo '<h6>Product ID='.$row["pid"].'</h6>';//echo '<br>';
					echo '<h6>Unit Price='.$row["pprice"].'</h6>';// echo '<br>';
					echo '<h6>Quantity='.$row["q"].'</h6>'; //echo '<br>';
					echo '<h6>Subtotal='.$row["total"].'</h6>'; //echo '<br>';
					echo '<h6>'.$row["pbrand"]." ".$row["pmodel"].'</h6></font></div>';//echo '<br>';
					
					
	  }
	}else{
	  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	?>
	</table>
  </div>
</div>  
</body>
</html>