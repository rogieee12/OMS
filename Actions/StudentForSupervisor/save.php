<?php
session_start();
include('../connection.php');
if (isset($_POST['selStud'])) {
    // Get the selected items
    $selectedItems = $_POST['selStud'];
    
    foreach ($selectedItems as $item) {
        $q=mysqli_query($connection,"SELECT * FROM studentlist WHERE student='".$item."'");
        $rows=mysqli_num_rows($q);
        if($rows==0){
            mysqli_query($connection,"INSERT into studentlist VALUES (null,'".$item."','".$_SESSION['sup']."','')");
        }
    }
    echo 'save';

} else {
    echo 'No items selected.';
}
?>
