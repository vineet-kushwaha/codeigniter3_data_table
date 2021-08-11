<?php 

session_start();

session_reset();
session_destroy();
// mysqli_close($conn);

header("Location: login.php");

?>