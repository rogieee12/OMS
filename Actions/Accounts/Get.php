<?php
	include'../connection.php';

	$q=mysqli_query($connection,"SELECT * FROM accounts inner join security ON accounts.username=security.username WHERE username='".$_POST['id']."'");
	$rows=mysqli_fetch_array($q);
	echo json_encode($rows);
?>