<?php
	include'../connection.php';

	$q=mysqli_query($connection,"DELETE  FROM evalquestions WHERE eq_id='".$_POST['id']."'");
	
?>