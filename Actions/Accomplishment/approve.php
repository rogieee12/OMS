<?php
	include'../connection.php';
	mysqli_query($connection,"UPDATE Accomplishment set remarks='1' WHERE ac_id='".$_POST['id']."'");
?>