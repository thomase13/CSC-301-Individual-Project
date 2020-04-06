<?php
require_once('../classes/companion.php');
$id=$_GET['id'];
$companion = new Companion();
$companion->id=$id;
$companion->delete();
?>