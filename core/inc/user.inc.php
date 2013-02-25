<?php 

	function fetch_users(){
		$result = mysql_query("SELECT * FROM users");
		
		$users = array();
		
		while(($row = mysql_fetch_assoc($result)) !== false){
			$users[] = $row;
		}
		
		return $users;
	}
	//profile info for user
	function fetch_user_info($id){
		$id = (int)$id;
		
		$sql = "SELECT * FROM users WHERE id = {$id}";
		$result = mysql_query($sql);
		
		$info = mysql_fetch_assoc($result);
		$info['avatar'] = (file_exists("{$GLOBALS['path']}/user_avatars/{$info['id']}.jpg")) ? "core/user_avatars/{$info['id']}.jpg" : "core/user_avatars/default.jpg";
		
		return $info;
	}
	//update the profile
	function set_profile_info($email, $about, $location, $avatar){
		$email = mysql_real_escape_string(htmlentities($email));
		$about = mysql_real_escape_string(nl2br(htmlentities($about)));
		$location = mysql_real_escape_string($location);
		
		if (file_exists($avatar)){
			$src_size = getimagesize($avatar);
			 
			if ($src_size['mime'] === 'image/jpeg'){
				$src_img = imagecreatefromjpeg($avatar);
			}else if ($src_size['mime'] === 'image/png'){
				$src_img = imagecreatefrompng($avatar);
			}else if ($src_size['mime'] === 'image/gif'){
				$src_img = imagecreatefromgif($avatar);
			}else{
				$src_img = false;
			}
			
			if ($src_img !== false){
				$thumb_width = 150;
				
				if ($src_size[0] <= $thumb_width){
					$thumb = $src_img;
				}else{
					$new_size[0] = $thumb_width;
					$new_size[1] = ($src_size[1] / $src_size[0]) * $thumb_width;
					
					$thumb = imagecreatetruecolor($new_size[0], $new_size[1]);
					imagecopyresampled($thumb, $src_img, 0, 0, 0, 0, $new_size[0], $new_size[1], $src_size[0], $src_size[1]);
				}
				
				imagejpeg ($thumb, "{$GLOBALS['path']}/user_avatars/($_SESSION[id]).jpg");
			}
		}
		
		$sql = "UPDATE 'users' SET 
							'email' = '{$email}',
							'location'= '{$location}',
							'about' = '{$about}'
							WHERE 'id' = {$_SESSION['id']}";
		
		
		mysql_query($sql);
	}
 ?>
