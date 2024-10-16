<?php
	include'../connection.php';
	if($_POST['p_id']==''){
		mysqli_query($connection,"INSERT into quescategory values (null,'".$_POST['Cat']."')");

	}
	else{
		mysqli_query($connection,"UPDATE quescategory set category='".$_POST['Cat']."' WHERE qcat_id='".$_POST['p_id']."'");
	}
	

?>