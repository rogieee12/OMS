<?php
	include'../connection.php';

	$q=mysqli_query($connection,"SELECT * FROM schoolyear WHERE sy_id='".$_POST['id']."'");
	$rows=mysqli_fetch_array($q);
	if($rows[2]==0){


	mysqli_query($connection,"UPDATE schoolyear set status='1' WHERE sy_id='".$_POST['id']."'");
}
else{
	mysqli_query($connection,"UPDATE schoolyear set status='0' WHERE sy_id='".$_POST['id']."'");
}
?>