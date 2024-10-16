<?php
session_start();
include'connection.php';

$q=mysqli_query($connection,"SELECT * FROM security WHERE username='".$_POST['username']."' and password='".$_POST['password']."'");
$rC=mysqli_num_rows($q);
if($rC>0){
$rows = mysqli_fetch_array($q);
$_SESSION['u']=$rows[0];
$_SESSION['acctype']=$rows[2];
	if($rows[2]=='Administrator'){
		echo "A";	
	}
	else if($rows[2]=='Coordinator'){
		echo "B";
	}	
	else if($rows[2]=='Supervisor'){
		echo "C";
	}
	else if($rows[2]=='Student'){
		echo "S";
	}


}
else
{
	echo "D";
}
?>