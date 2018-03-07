<?php


// Create connection
$conn = new mysqli("localhost", "root", "", "event");
mysqli_set_charset($conn, 'UTF8');

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 


?>