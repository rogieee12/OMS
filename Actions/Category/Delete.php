<?php
	include'../connection.php';

	$q=mysqli_query($connection,"DELETE  FROM quescategory WHERE qcat_id='".$_POST['id']."'");
	
?>