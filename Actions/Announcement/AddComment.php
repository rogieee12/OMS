<?php
	session_start();
	include'../connection.php';
	mysqli_query($connection,"INSERT into comments values (null,'".$_POST['p_id']."','".$_SESSION['u']."','".$_POST['myInput']."','".date('Y-m-d H:i:s')."')");

?>