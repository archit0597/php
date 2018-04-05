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
	$cid=$_SESSION["details"][0];
	$sql="select * from cust where custid='".$cid."'";
	$result=mysqli_query($link,$sql);
	if($result){
	  while(($row = $result->fetch_assoc())) {
		  echo "<h2> CustID=".$row["custid"]." and Name=".$row["custname"]." and EMail=".$row["custemail"]." and Phone=".$row["custphone"]." and Adress=".$row["custaddress"]." and State=".$row["custstate"]."</h2>";
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
					
	<?php
	
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
							
							echo '<h4>Here are all the details of the order of OrderID='.$row["orderid"]." and Order Status=".$row["ostatus"].' and Order Date='.$row["odate"].'</h4>';
					}else{
						if($row["orderid"]==$dummy){
							echo '<hr>'; echo '<br>';
						}
					}
					
					echo '<img src="pics/'.$row["pimgurl"].'.jpg" class="img-responsive" style="height: 100px; width: 100px;"/>'; echo '<br>';
					echo '<h4>Product ID='.$row["pid"].'</h4>';echo '<br>';
					echo '<h4>Name='.$row["pbrand"]." ".$row["pmodel"].'</h4>';echo '<br>';
					echo '<h4>Unit Price='.$row["pprice"].'</h4>'; echo '<br>';
					echo '<h4>Quantity='.$row["q"].'</h4>'; echo '<br>';
					echo '<h4>Subtotal='.$row["total"].'</h4>'; echo '<br>';
					
					
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