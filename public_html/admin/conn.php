<?php

$host = 'localhost';
$database = 'sjktechc_movieStore';
$user = 'sjktechc_user';
$password = 'pass0846080';

$conn = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno($conn))
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

?> 
