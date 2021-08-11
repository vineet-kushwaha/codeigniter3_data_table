<?php
$servername='localhost';
$user='root';
$dbpass='';
$dbname='contact';
//mysqli procedural
$conn = mysqli_connect($servername, $user, $dbpass,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // echo "Connected successfully";

?>