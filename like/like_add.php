<?php
require_once('like.php');

$id=$_GET['id'];
$like=new Like();
$like->comp_id=$id;
$like->create();