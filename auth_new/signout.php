<?php
session_destroy();
require('../classes/database.php');
require_once('../classes/auth.php');
if(!Auth::logged_in()) header('location: ../auth_new/signin.php');
Auth::signout('location: signin.php');
header('location: .../../../index.php');
?>