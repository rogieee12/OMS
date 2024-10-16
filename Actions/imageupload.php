<?php 
session_start();
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
   
        $imageData =$_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];

        mysqli_query($connection,"UPDATE accounts set profile='".$imageData."' WHERE username='".$_SESSION['u']."'");

    } else {
        echo "Error: " . $_FILES['image']['error'];
    }
}

?>