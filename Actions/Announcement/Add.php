<?php
	session_start();
	include'../connection.php';
	if($_POST['p_id']==''){
		mysqli_query($connection,"INSERT into announcement values (null,'".$_POST['Message']."','".date('Y-m-d')."','','".$_SESSION['u']."','".$_POST['sup']."')");
	}
	else{
		mysqli_query($connection,"UPDATE announcement set message='".$_POST['Message']."' WHERE a_id='".$_POST['p_id']."'");
	}	

?>