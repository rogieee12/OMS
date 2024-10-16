<?php
	include'../connection.php';
	// $q=mysqli_query($con,"SELECT oid FROM tblOffices WHERE Offices='".$_POST['Office']."'");
	// $rows=mysqli_fetch_array($q);
	if($_POST['p_id']==''){
		mysqli_query($connection,"INSERT into Accounts(username,lastname,firstname,middlename) values ('".$_POST['Email']."','".$_POST['Lastname']."','".$_POST['Firstname']."','".$_POST['Middlename']."')");
		mysqli_query($connection,"INSERT into security values ('".$_POST['Email']."','".$_POST['Password']."','".$_POST['AccountType']."')");

	}
	else{
		mysqli_query($connection,"UPDATE security set password='".$_POST['Password']."', acctype='".$_POST['AccountType']."' WHERE username='".$_POST['username']."'");
	}
	

?>