<?php 
include('core/init.inc.php');

if(isset($_POST['email'], $_POST['location'],$_POST['about'])){
		$errors = array();
		
		if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) === false){
			$errors[] = 'the mail is not valid';
		}
		
		if (preg_match('#^[a-z0-9 ]+$#i', $_POST['location']) === 0){
			$errors[] ='the location must contain a-z 0-9 and space';
		}
		if (empty($_FILES['avatar']['tmp_name']) === false){
			$file_ext = end(explode('.', $_FILES['avatar']['name']));
			
			if (in_array(strtolower($file_ext), array('jpg', 'jpeg', 'png', 'gif')) === false){
			$errors[] = 'Your file must be an image';
			}
		}
		
		if (empty($errors)){
			set_profile_info($_POST['email'], $_POST['location'],$_POST['about'], (empty($_FILES['avatar']['tmp_name'])) ? false : $_FILES['avatar']['tmp_name']);
		}
		$user_info = array(
			'email'	=> htmlentities($_POST['email']),
			'location' => htmlentities($_POST['location']),
			'about' => htmlentities($_POST['about'])
		);
}else{

$user_info = fetch_user_info($_SESSION['id']);
}
?>
<div>
	<?php
		if (isset($errors) === false){
			echo 'Click to edit profile';
		}else if (empty($errors)){
			echo 'UPDATED aideeeeeeee';
		}else{
			echo '<ul><li>', implode('</li><li>', $errors), '</li></ul>';
		}
	?>
</div>


<form action="" method="post" enctype="multipart/form-data" >
	<div>Mail
		<input type="text" name="email" id="email" value="<?php echo $user_info['email']; ?>" />
	</div>
	<br/>
	<div>Location
		<input type="text" name="location" id="location" value="<?php echo $user_info['location']; ?>" />
	</div>
	<br/>
	<div>About
		<textarea name="about" id="about" rows="15" cols="50"><?php echo strip_tags( $user_info['about']); ?></textarea>
	</div>
	<br/>
	<div>Avatar
		<input type="file" name="avatar" id="avatar" />
	</div>
		<input type="submit" value="update" />
</form>