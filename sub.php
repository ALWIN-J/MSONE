<?php
include("config.php");
  $id=$_REQUEST['filmid'];
  $tb=$con->query("select _id from film where ImdbId='".$id."'");
  $r=mysqli_fetch_assoc($tb);
  move_uploaded_file( $_FILES['srt']['tmp_name'],"srt/".$r['_id'].".srt");
 	$qry="UPDATE `srt` SET `date` = CURRENT_TIMESTAMP,`status` = 1 WHERE `srt`.`Film_id` ='".$id."' and `status` != -1 ;";
	$tbl=$con->query($qry);
	//echo $id;
  echo "<script>location.href='dash.html';alert('Succesfully submitted')</script>";
?>