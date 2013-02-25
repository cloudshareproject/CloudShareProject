<!DOCTYPE html>
<html>
	<head>
		<title>CloudShare - Share it</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"></style>
		<link rel="stylesheet" type="text/css" href="css/jquery-mobile-min.css"></style>
		<link rel="stylesheet" href="css/style-gallery.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/userstyle.css"></style>
		
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
        </script>
		<script src="https://ajax.aspnetcdn.com/ajax/jquery.mobile/1.2.0/jquery.mobile-1.2.0.min.js">
        </script>
		<script language="JavaScript">
			<!-- Activate cloaking device
			var randnum = Math.random();
			var inum = 10;
			// Change this number to the number of images you are using.
			var rand1 = Math.round(randnum * (inum-1)) + 1;
			images = new Array
			images[1] = "img/bg-01.jpg"
			images[2] = "img/bg-02.jpg"
			images[3] = "img/bg-03.jpg"
			images[4] = "img/bg-04.jpg"
			images[5] = "img/bg-05.jpg"
			images[6] = "img/bg-06.jpg"
			images[7] = "img/bg-07.jpg"
			images[8] = "img/bg-08.jpg"
			images[9] = "img/bg-09.jpg"
			images[10] = "img/bg-10.jpg"
			// Ensure you have an array item for every image you are using.
			var image = images[rand1]
			// Deactivate cloaking device -->
		</script>
	
	</head>
		<script language="JavaScript">
	
		document.write('<body background="'+image+'"text="white">')
		
		</script>
	
	<!-- head-bar -->
	<div class="header">
		<p id="tittle">Welcome to <p id="tittle2">CloudShare</p></p>
	</div>
	<div class="social">
		<a href="https://www.facebook.com/CloudPlayer" target="_blank" ><img src="img/facebook-logo.gif" class="social-logo"/></a>
		<img src="img/twitter-logo.gif" class="social-logo"/>
	</div>
<div class="center">
<!-- FORM -->
	
            <img id="logo" src="img/cp.png" />

			
			
			
<div class="form-box">
		<!-- LOGIN FORM -->
					<div class="form" id="login">
					<div data-role="content" class="ui-content" id="form" role="main">
							<form name="login" method="post" action="">
								<div class="ui-controlgroup-controls">
									
									<input name="site_user" id="textinput2" placeholder="Username" value="" type="text"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" required >
								</div>
							
								<div class="ui-controlgroup-controls">
								   
									<input name="pass" id="textinput1" placeholder="Password" value="" type="password" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" required >
								</div>
							<br/>
							<button name="submit" data-role="button"  data-corners="true" data-shadow="true" data-wrapperels="span" class=" ui-btn-corner-all ui-btn-active-d ui-btn-up-d"> Sign in
								</button>
							<br/>
							
							</form>  
					   
						</div>          
					   </div>
					   
			<!-- REGISTER FORM -->
						<div class="form" id="register">
						<div data-role="content" class="ui-signin"  role="main">
									
						<h1 id="signup">
							New to CloudPlayer?<h2 id="signup"> Sign up</h2></h1>
								<form name="login" method="post" action="">
							
								<div class="ui-controlgroup-controls">

									<input name="site_user" id="textinput2" placeholder="Username" value="" type="text" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
									<input name="email" id="textinput2" placeholder="Email" value="" type="text" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>

								</div>

						<br/>
								<div class="ui-controlgroup-controls">
									<input name="pass" id="textinput1" placeholder="Password" value="" type="password" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
								</div>
			 
								<div class="ui-controlgroup-controls">
								   
									<input name="password_2" id="textinput1" placeholder="Confirm Password" value="" type="password" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
								</div>
							<br/>
							
						<button name="submit2" data-role="button"  data-corners="true" data-shadow="true" data-wrapperels="span" class=" ui-btn-corner-all ui-btn-active-d ui-btn-up-d"> Sign up
								</button>
							</form> 
						</a>
						</div>                
						</div>
						
	</div>
	
	<!-- Slogan -->
	
	<div class="slogan">
		<p>-Pure CloudShare. Pure Power.</p>
		<p>-CloudShare - Just share it.</p>
		<p>-Add to your CloudShare.</p>
		<p>-All you need is CloudShare.</p>
	</div>

	
</div>

</html>

<!------------LOGIN--PHP-------->
<?php

//connect to database
$error = "Opps I could not connect";
@mysql_connect('instance39858.db.xeround.com:7628','cloudshare','nasko1995') or die($error);
@mysql_select_db('cloud_share') or die($error);


if(isset($_POST['submit']))
{
 $user = htmlspecialchars(mysql_real_escape_string($_POST['site_user']));
 $pass = $_POST['pass'];
 $mysql = mysql_query("SELECT * FROM USERS WHERE name = '{$user}' AND pass = '{$pass}'");
 $count = mysql_num_rows($mysql);
 $row = mysql_fetch_assoc($mysql);
 if($count == 1)
 {
	$_SESSION['name'] = htmlentities($_POST['name']);
	header ('Location: profile.php');
	die();
 } 
}
?>


<!---------REGISTER--PHP-------->

<?php
$con = mysql_connect('instance39858.db.xeround.com:7628','cloudshare','nasko1995');
if (!$con)
  {
  die('Opps no connection');
  }

mysql_select_db("cloud_share", $con);
if(isset($_POST['submit2']))
{
 $user = htmlspecialchars(mysql_real_escape_string($_POST['site_user']));
 $email = htmlspecialchars(mysql_real_escape_string($_POST['email']));
 
 $pass = $_POST['pass'];
 
 $query1 = mysql_query("SELECT * FROM users WHERE name = '".$user."'");
 $query2 = mysql_query("SELECT * FROM users WHERE email = '".$email."'");
 $q1 = mysql_num_rows($query1);
 $q2 = mysql_num_rows($query2);
 if ($q1 > 0) {
  echo '<div class="error" >username taken</div>';
 }
 if ($q2 > 0) {
  echo '<div class="error" >email taken</div>';
 }




$sql="INSERT INTO users (name, pass, email)
VALUES
('$user','$pass','$email')";

if(mysql_query($sql,$con))
 {
	header ('Location: succes.php');
 } 




mysql_close($con);

}
?>