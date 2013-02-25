<?php 

include('core/init.inc.php');


 ?>

 
 
 <div>
	<?php
	
	foreach (fetch_users() as $user){
		?>
			<p>
				<a href="profile.php?id=<?php echo $user['id']; ?>"><?php echo $user['name'] ?></a>
			</p>
		<?php
	}
	
	?>
 </div>