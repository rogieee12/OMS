<?php
	include'../connection.php';

	$q=mysqli_query($connection,"SELECT * FROM quescategory WHERE qcat_id='".$_POST['id']."'");
	$rows=mysqli_fetch_array($q);
	echo json_encode($rows);
?>