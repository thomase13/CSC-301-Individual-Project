<?php
require_once('classes/companion.php');
require_once('classes/template.php');
?>

<?php
Template::showHeader('Companion Acquirer');
?>

<doctype html>
<html lang="en">
	<body>
		<?php 
		$companion=new Companion();
		$companion->index();
		?>
</body>
<?php Template::showFooter();?>
</html>