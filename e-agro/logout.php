<?php   
require 'session.php';
session_destroy(); //destroy the session
header("location:/e-agro/index.php"); //to redirect back to "index.php" after logging out
exit();
?>