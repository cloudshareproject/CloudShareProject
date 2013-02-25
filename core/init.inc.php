<?php 
session_start();

$con = mysql_connect('instance39858.db.xeround.com:7628','cloudshare','nasko1995');
if (!$con)
  {
  die('Opps no connection');
  }

mysql_select_db("cloud_share", $con);

$path = dirname(__FILE__);

include("{$path}/inc/user.inc.php");




$_SESSION['id'] =1;
 ?>
