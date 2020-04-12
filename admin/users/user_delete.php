<?php
require_once('../../classes/database.php');
require_once('../../classes/user.php');
$id=$_GET['id'];
$user = new User();
$user->id=$id;
$user->delete();
?>