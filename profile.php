<?php
include('core/init.inc.php');
include('core/inc/user.inc.php');
$user_info = fetch_user_info($_GET['id']);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>CloudPlayer - Make it happen</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"></style>
		<link rel="stylesheet" type="text/css" href="css/userstyle.css"></style>
		<link rel="stylesheet" type="text/css" href="css/jquery-mobile-min.css"></style>
		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/style-gallery.css" type="text/css" media="screen" />

				
		<script src="js/gallery.js">
        </script>		
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
	<body background="' + image + '" text="white">
			<!-- head-bar -->
			<div class="header">
				<a href="/index.html" ><p id="tittle-user">CloudShare </p></a>
			</div>
			<div class="social">
				<a href="https://www.facebook.com/CloudPlayer" target="_blank" ><img src="img/facebook-logo.gif" class="social-logo"/></a>
				<img src="img/twitter-logo.gif" class="social-logo"/>
			</div>
			
			<?php
	if ($user_info === false){
		echo 'User do not exist';
	}else{
	
	
?>
			
				<div class="center-user" >
					
					<img src="<?php echo $user_info['avatar']; ?>" alt="AVATAR" width="150px" class="avatar"/> 
					
					<h1 class="username"> <?php $user['name']; ?></h1>
					<br/> 
					<h2 class="info"><?php  ?></h2>
					<hr />
					
		<?php
	}
?>			
		<!---------------GALLERY----------->
		<table border="0" cellpadding="5" cellspacing="0" width="100%" height="300px" > 

	<tr>

	<td align="center" colspan="6" style="font-weight: bold; font-size: 18pt; color: silver; id="imageTitleCell">

	Tittle</td>

	</tr>

	<tr>

	<td align="center" colspan="6" >

	<img height="400" src="image1.png" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;

	border-bottom: 1px solid" width="400" id="imageLarge" alt="default" /></td>

	</tr>

	<tr>

	<td align="left" colspan="6" style="padding-right: 100px; padding-left: 100px; color: white; border:1px solid #DEDEDE;  border-radius:15px;

	background-color: #B3B3B3" id="imageDescriptionCell">
	INFO
	</td>

	</tr>

	<tr>

	<td id="scrollPreviousCell" style="color: Silver" onclick="scrollPrevious();" onmouseout="scrollStop();">

	&lt;&lt; Previous</td>

	<td>

	<img id="scrollThumb1" height="100" src="image1.png" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;

	border-bottom: 1px solid" width="100" onclick="handleThumbonclick(0);" /></td>

	<td>

	<img id="scrollThumb2" height="100" src="image2.png" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;

	border-bottom: 1px solid" width="100" onclick="handleThumbonclick(1);" /></td>

	<td>

	<img id="scrollThumb3" height="100" src="image3.png" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;

	border-bottom: 1px solid" width="100" onclick="handleThumbonclick(2);" /></td>

	<td>

	<img id="scrollThumb4" height="100" src="image4.png" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;

	border-bottom: 1px solid" width="100" onclick="handleThumbonclick(3);" /></td>

	<td id="scrollNextCell" style="color: Black" onclick="scrollNext();" onmouseout="scrollStop();">

	Next &gt;&gt;</td>

	</tr>

	</table>

		<!----------END--GALLERY----------->
		
	<hr />
	
</div>
	</body>
</html>