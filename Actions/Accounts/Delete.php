<?php
	include'../connection.php';
	mysqli_query($connection,"DELETE FROM security WHERE username='".$_POST['id']."'");
	mysqli_query($connection,"DELETE FROM accounts WHERE username='".$_POST['id']."'");
?>