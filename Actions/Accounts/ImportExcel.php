<?php
include'../connection.php';


  function generateRandomString($length = 5) {
              $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              return substr(str_shuffle(str_repeat($characters, ceil($length / strlen($characters)))), 0, $length);
   }

if (isset($_FILES['Excel'])) {
    $file = $_FILES['Excel']['tmp_name'];
    if (($handle = fopen($file, "r")) !== FALSE) {
        fgetcsv($handle);
        while (($data = fgetcsv($handle)) !== FALSE) {
            $username = $data[0];
            $lastname = $data[1];
            $firstname = $data[2];
            $middlename = $data[3];
            $contact = $data[4];
            $Account = $data[5];
            $randomString = generateRandomString();

            mysqli_query($connection,"INSERT into security values('".$username."','".$randomString."','".$Account."')");

            $sql = "INSERT INTO accounts (username,lastname,firstname,middlename,contact,profile) VALUES ('$username', '$lastname','$firstname','$middlename','$contact','')";
            mysqli_query($connection,$sql);
        }
        fclose($handle);
        echo "CSV data imported successfully!";
    } else {
        echo "Error opening the file.";
    }
} else {
    echo "No file uploaded.";
}

$connection->close();
?>
