<?php
defined('EXEC') or die;
include $main->root.'/views/controller.php';
?>
<html>
	<head>
	<link href="/panel/css/style.css" rel="stylesheet">
	<link href="/panel/css/fontello.css" rel="stylesheet">
	</head>
	<body>
		<div id="leftPanel">
		<?php print Render::module($main,'menu',true);?>
		</div>
		<div id="dashBoard">
			<?php print $page;?>
		</div>
	</body>
</html>