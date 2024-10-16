<?php
	include'../connection.php';
	if($_POST['p_id']==''){
		mysqli_query($connection,"INSERT into evalquestions values (null,'".$_POST['Cat']."','".$_POST['Question']."')");

	}
	else{
		mysqli_query($connection,"UPDATE evalquestions set qcat_id='".$_POST['Cat']."', question='".$_POST['Question']."' WHERE qcat_id='".$_POST['p_id']."'");
	}
	

?>