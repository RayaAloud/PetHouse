<?php 
session_start();

session_destroy();

header("Location: http://localhost:3000/index.php");
?>