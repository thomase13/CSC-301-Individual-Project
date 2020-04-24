<?php
require_once('../classes/database.php');
require_once('../classes/auth.php');

if (Auth::logged_in()) {
	echo 'Yes';
}
else if (!Auth::logged_in()){
	echo 'No';
}
else echo ('No response');
?>