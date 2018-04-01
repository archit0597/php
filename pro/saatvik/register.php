<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<sCRIPT language="javascript" SRC="js/script.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<?php
$nameErr=$aadharErr=$emailidErr=$userErr=$stateErr=$passwordErr=$cpasswordErr="";
$name=$aadhar=$emailid=$user=$state=$password=$cpassword="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["name"])) {
               $nameErr = "Name is required";
	}
	else
	{
		$name = test_input($_POST["name"]);
            }
			 if (empty($_POST["emailid"])) {
               $emailidErr = "Email is required";
            }else {
               $emailid = test_input($_POST["emailid"]);
               
               
               if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)) {
                  $emailidErr = "Invalid email format"; 
               }
            }
			if (empty($_POST["uname"])) {
               $unameErr = "user Name is required";
	}
	else
	{
		$uname = test_input($_POST["uname"]);
            }
		if (empty($_POST["password"])) {
               $passwordErr = "password is required";
            }else {
               $password = test_input($_POST["password"]);
            }
			
			if (empty($_POST["cpassword"])) {
               $cpErr = "confirm the password";
            }
			else if($_POST['password']!=$_POST["cpassword"])
				$cpErr="password did not match";
			else
				$cpassword=test_input($_POST["cpassword"]);	
				
				function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>
<body>
<div class="container">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<fieldset>


<legend><font color="#0000FF">Register Yourself Here</font></legend>

<p><span class = "error"><font color="red">* required field.</font></span></p>

<div class="form-group">
  <label class="col-md-4 control-label">Name</label> <span class = "error"><font color="red">*</font> <?php echo $nameErr;?></span> 
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="name" placeholder=" Name" class="form-control"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Age</label> <span class = "error"><font color="red">*</font> <?php echo $userErr;?></span> 
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="age" placeholder=" Username" class="form-control"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">mobile</label><span class = "error"><font color="red">*</font> <?php echo $passwordErr;?></span> 
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-asterick"></i></span>
  <input  name="mobile" placeholder=" mobile" class="form-control"  type="text">
    </div>
  </div>
</div> 
 
<div class="form-group"> 
  <label class="col-md-4 control-label">state</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
    <select name="state" class="form-control selectpicker" >
      <option value="">--------Select----------</option><option value="AP,Andhra Pradesh" >Andhra Pradesh</option><option value="AR,Arunachal Pradesh" >Arunachal Pradesh</option><option value="AS,Assam" >Assam</option><option value="BH,Bihar" >Bihar</option><option value="CH,Chandigarh" >Chandigarh</option><option value="CG,Chattisgarh" >Chattisgarh</option><option value="DH,Delhi" >Delhi</option><option value="GD,Goa" >Goa</option><option value="GJ,Gujarat" >Gujarat</option><option value="HY,Haryana" >Haryana</option><option value="HP,Himachal Pradesh" >Himachal Pradesh</option><option value="JK,Jammu And Kashmir" >Jammu And Kashmir</option><option value="JH,Jharkhand" >Jharkhand</option><option value="KN,Karnataka" >Karnataka</option><option value="KL,Kerala" >Kerala</option><option value="LD,Lakshadweep" >Lakshadweep</option><option value="MP,Madhya Pradesh" >Madhya Pradesh</option><option value="MH,Maharashtra" >Maharashtra</option><option value="MN,Manipur" >Manipur</option><option value="MG,Meghalaya" >Meghalaya</option><option value="MZ,Mizoram" >Mizoram</option><option value="NL,Nagaland" >Nagaland</option><option value="XX,No State" >No State</option><option value="OR,Odisha" >Odisha</option><option value="PC,Puducherry" >Puducherry</option><option value="PB,Punjab" >Punjab</option><option value="RJ,Rajasthan" >Rajasthan</option><option value="SK,Sikkim" >Sikkim</option><option value="TN,Tamilnadu" >Tamilnadu</option><option value="TG,Telangana" >Telangana</option><option value="TR,Tripura" >Tripura</option><option value="UT,Union Territory" >Union Territory</option><option value="UC,Uttarakhand" >Uttarakhand</option><option value="UP,Uttar Pradesh" >Uttar Pradesh</option><option value="WB,West Bengal" >West Bengal</option>	</select></span>
  </div>
</div>
</div>
	<div class="form-group">
  <label class="col-md-4 control-label">country</label><span class = "error"><font color="red">*</font> <?php echo $nameErr;?></span> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
        <input name= "country" placeholder="country" class="form-control" type="text">
    </div>
  </div>
</div>

       <div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <input type="submit" class="btn btn-warning" > <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
    </form>
    </div>
    </div>
 <?php
if(isset($_POST['submit'])){
$servername='localhost';
$username='root';
$password='';
$link= mysql_connect($servername,$username,$password);
if($link==false)
	die("connection failed". con-connect_error);
if (!mysql_select_db('registration', $link)) {
    echo 'Could not select database';
    exit;
}
$user=($_POST["user"]);
$password=$_POST["password"];
$state=($_POST["state"]);
$aadhar=($_POST["aadhar"]);

$sql = ("INSERT INTO register(name,user,password,emailid,state)VALUES
  ('$name', '$user','$password','$emailid','$state')");
if(mysql_query($sql,$link)){
	
	echo "<a href='firstpage.php'></a>";
	echo "start again";
}
mysql_close($link);
}
}
?>
</body>
</html>