<?php
	include'../connection.php';

	$q=mysqli_query($connection,"SELECT * FROM evalquestions INNER JOIN quescategory ON evalquestions.qcat_id=quescategory.qcat_id WHERE evalquestions.eq_id='".$_POST['id']."'");
	$rows=mysqli_fetch_array($q);
	echo json_encode($rows);
	// echo $rows["Category"];
?>