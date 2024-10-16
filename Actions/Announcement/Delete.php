<?php
	include'../connection.php';
	mysqli_query($connection,"DELETE FROM announcement WHERE a_id='".$_POST['id']."'");
?>