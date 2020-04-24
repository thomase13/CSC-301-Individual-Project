<?php
session_start();
if(!(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true)) { 
header('location: ../index.php');
}
echo $_SESSION['user_id'];
?>