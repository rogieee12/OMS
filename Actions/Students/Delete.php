<?php
	include'../connection.php';
	mysqli_query($connection,"DELETE FROM students WHERE studentid='".$_POST['id']."'");
?>