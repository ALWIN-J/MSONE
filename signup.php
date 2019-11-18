<?php
include "config.php";
$u=$_REQUEST['u'];
$e=$_REQUEST['e'];
$p=$_REQUEST['p'];
$tb=$con->query("select * from user where u='$u'");
if(mysqli_fetch_array($tb))
{
	echo(0);
}
else
{
	$con->query("INSERT INTO `user` (`i`, `u`, `p`, `e`) VALUES (NULL, '$u', '$p','$e');");
	echo(1);
	$cookie_name = "user";
	$cookie_value = $u;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}
?>