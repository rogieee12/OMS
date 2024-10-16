<?php
	session_start();
	include'connection.php';
	mysqli_query($connection,"UPDATE security set password='".$_POST['Password']."' WHERE username='".$_SESSION['u']."'");
   session_destroy();
   echo "a";
?>