<?php
	include'../connection.php';
	mysqli_query($connection,"DELETE FROM Accomplishment WHERE ac_id='".$_POST['id']."'");
?>