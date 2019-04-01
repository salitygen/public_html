<?php
defined('EXEC') or die;
include $main->root.'/panel/them/controller.php';
?>

<html>
	<head>
	<link href="/panel/them/css/style.css" rel="stylesheet">
	</head>
	<body>
		<div id="leftPanel">
		</div>
		<div id="dashBoard">
			<div id="topPanel">
			<?php print $page;?>
			</div>
		</div>
	</body>
</html>