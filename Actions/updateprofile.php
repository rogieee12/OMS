<?php 
session_start();
include'connection.php';
mysqli_query($connection,"UPDATE accounts set lastname='".$_POST['Lastname']."', firstname='".$_POST['Firstname']."', middlename='".$_POST['Middlename']."', gender='".$_POST['Gender']."', birthday='".$_POST['Birthday']."', age='".$_POST['Age']."', HouseNo='".$_POST['HouseNo']."', Street='".$_POST['Street']."', CM='".$_POST['CM']."', Province='".$_POST['Province']."', Zipcode='".$_POST['ZipCode']."', contact='".$_POST['Contact']."'   WHERE username='".$_SESSION['u']."'");


?>