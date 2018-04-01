<?php
 if(isset($_POST['submit']))
 {
	 echo "test";

session_start();
$_SESSION['sid']=session_id();
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
$username =$_POST["user"];
$password =$_POST["password"];
$query = "SELECT * FROM `register` WHERE user='$username' and password='$password'";
if(mysql_query($query,$link))
{
echo "<a href='display.php'></a>";
}
 }
?>
<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<sCRIPT language="javascript" SRC="js/script.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style>
.1
{
	text-align:center
}
.2
{
	text-align:center
}
.3
{
	text-align:center
}
</style>
<body>
<center>
<form action="display.php" method="post">
<legend><font size="15"<font color="black">Login</font></font></legend>
<div class="3">
<div class="form-group">
  <label class="col-md-1 control-label">Username</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-bird"></i></span>
  <input  name="user" placeholder=" Username" class="form-control"  type="text">
    </div>
  </div>
  </div>
</div><br /><br />
<div class="2">
<div class="form-group">
  <label class="col-md-1 control-label">Password</label> 
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-bird"></i></span>
  <input  name="password" placeholder=" Password" class="form-control"  type="password">
    </div>
  </div>
  </div>
</div> <br /><br />
<div class="1">
 <div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-4">
    <button type="submit"  name="submit" class="btn btn-warning" >submit </button>
  </div>
</div>
</div>
</fieldset>
</form>
</div>
    </div>
    <br /><br /><br /><br /><br /><br />
 <a href = "firstpage.php" tite = "name">
 <p><font color="#000000">go to starting page</font></p>
</body>
</html>
 