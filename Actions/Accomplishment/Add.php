<?php
	session_start();
	include'../connection.php';


$timeInAM = $_POST['timeInAM'];
$timeOutAM = $_POST['timeOutAM'];
$timeInPM = $_POST['timeInPM'];
$timeOutPM = $_POST['timeOutPM'];


	// Function to compute the time difference between two times
function computeTimeDifference($startTime, $endTime) {
    // Create DateTime objects from the time strings
    $start = DateTime::createFromFormat('h:i A', $startTime);
    $end = DateTime::createFromFormat('h:i A', $endTime);

    // Calculate the difference between the start and end times
    $interval = $start->diff($end);

    // Convert the time difference to total minutes
    $totalMinutes = ($interval->h * 60) + $interval->i;

    return $totalMinutes;
}

$totalMinutesAM = computeTimeDifference($timeInAM, $timeOutAM);
$totalMinutesPM = computeTimeDifference($timeInPM, $timeOutPM);


$totalMinutes = $totalMinutesAM + $totalMinutesPM;


$totalHours = intdiv($totalMinutes, 60); // Get the total hours
$remainingMinutes = $totalMinutes % 60;  // Get the remaining minutes

$totHrs = $totalHours."hrs:".$remainingMinutes." min";







	if($_POST['p_id']==''){
			mysqli_query($connection,"INSERT into accomplishment values (null,'".$_SESSION['u']."','".$timeInAM."','".$timeOutAM."','".$timeInPM."','".$timeOutPM."','".$_POST['summernote']."','".$_POST['date']."','$totHrs ','')");
	}
	else{
			mysqli_query($connection,"UPDATE announcement set message='".$_POST['Message']."' WHERE a_id='".$_POST['p_id']."'");
	}	

?>