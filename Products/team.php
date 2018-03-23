<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guitar Store - Shop Online</title>
    <link rel="stylesheet" type="text/css" href="css/team.css" />
    <!--link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- csstransforms3d-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load -->
    <!--script src="js/modernizr.custom.25376.js"></script-->
</head>

<body>

<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "gsms";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die(mysqli_error($conn));

 $q1result = mysqli_query($conn, "Select count(*) from products") or die(mysqli_error($conn));
	echo "Working";
 echo "Number is:".mysql_num_rows($q1result);
	for($i as $q1result){
		echo $i['pprice']."<br>";
	}
  

//Add the SQL Query code


?>


                            <!--One row begins-->
                            <div class="middle row text-center" style="margin-bottom:1rem;">
                                <div class="card-deck">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="card">
                                            <img class="card-img-top" src="assets/miscicons/maleUSer.jpg" alt="Tony Philip">
                                            <div class="card-block exsp">
                                                <h4 class="card-title">Tony Philip</h4>
                                                <p class="card-text">Founder-Alumni and Tehnical Mentor</p>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-sm-3 col-xs-12">
                                        <div class="card">
                                            <img class="card-img-top" src="assets/members/RS/RSAyushi509.png" alt="Ayushi Kandoi">
                                            <div class="card-block exsp">
                                                <h4 class="card-title">Ayushi Kandoi</h4>
                                                <p class="card-text">Electronic and Power Systems Domain Leader</p>
                                            </div>
                                        </div>
									</div>
                                </div>
                            </div>
                            <!--One row ends-->
                 <div class="dummy">

                </div>
                <section class="footer">
                    <div style="display:flex;flex-wrap:wrap;padding-top:2rem;padding-bottom:2rem;" class="container">
                        <div class="address_box">
                            <p class="address_heading">Address</p>

                            <p>Tech Park 1406/A<br>SRM University Kattankulathur<br>603203<br>Call : +919912331007</p>
                        </div>

                        <div class="social_box">
                            <section id="lab_social_icon_footer">
                                <div class="container">
                                    <div class="text-center center-block">
                                        <a href="https://www.facebook.com/SRMROV/"><i id="social-fb" class="fab fa-facebook-square fa-5x social"></i></a>
                                        <a href="#"><i id="social-wp" class="fab fa-whatsapp-square fa-5x social"  data-toggle="tooltip" data-placement="top" title="+919912331007"></i></a>
                                        <a href="mailto:reconsubsea@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-5x social"></i></a>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>

</body>

</html>