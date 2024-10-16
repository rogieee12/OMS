<?php   
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database_name = "oms";

   $connection = new mysqli($servername, $username, $password, $database_name);
   if ($connection->connect_error) {
      die("MySQL connection failed: " . $connection->connect_error);
   }

?>