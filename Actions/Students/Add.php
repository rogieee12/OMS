<?php
	include'../connection.php';
	// $q=mysqli_query($con,"SELECT oid FROM tblOffices WHERE Offices='".$_POST['Office']."'");
	// $rows=mysqli_fetch_array($q);
	if($_POST['p_id']==''){
		mysqli_query($connection,"INSERT into students values (null,'".$_POST['Student']."','".$_POST['Contact']."','".$_POST['Address']."')");

	}
	else{
		mysqli_query($connection,"UPDATE students set fullname='".$_POST['Student']."', contact='".$_POST['Contact']."', Address='".$_POST['Address']."' WHERE studentid='".$_POST['p_id']."'");
	}
	

?>