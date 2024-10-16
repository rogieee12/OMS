<?php
	include'../connection.php';
	if($_POST['p_id']==''){
		mysqli_query($connection,"INSERT into schoolyear values (null,'".$_POST['SY']."','0')");

	}
	else{
		mysqli_query($connection,"UPDATE schoolyear set sy_desc='".$_POST['SY']."' WHERE sy_id='".$_POST['p_id']."'");
	}
	

?>