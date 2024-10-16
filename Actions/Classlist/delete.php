<?php
	include'../connection.php';
	mysqli_query($connection,"DELETE FROM studentlist WHERE studlist_id='".$_POST['id']."'");
?>