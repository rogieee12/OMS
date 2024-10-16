<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   
    if (!empty($_POST['r']) && !empty($_POST['username'])) {

        foreach ($_POST['r'] as $questionId => $rating) {
            $questionId = mysqli_real_escape_string($connection, $questionId);
            $rating = mysqli_real_escape_string($connection, $rating);
            $username = mysqli_real_escape_string($connection, $_POST['username']);
            
            $query = "INSERT INTO responses (eq_id, rating, student, xdate) VALUES ('$questionId', '$rating', '$username','".date('Y-m-d')."')";
            mysqli_query($connection, $query) or die(mysqli_error($connection));
        }
        
        echo "Ratings saved successfully!";
    } else {
        echo "Please complete all fields!";
    }
}
?>
