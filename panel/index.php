<?php
defined('EXEC') or die;
include $main->root.'/views/controller.php';
?>
<html>
	<head>
	<meta charset="utf-8">
	<link href="/panel/css/style.css" rel="stylesheet">
	<link href="/panel/css/fontello.css" rel="stylesheet">
	</head>
	<body <?php if($main->view == 'settings') print 'class="level2"'; ?>>
		<div id="leftPanel">
		<?php print Render::view($main,'menu',false);?>
		</div>
		<div id="dashBoard">
			<?php print Render::view($main,false,false); ?>
		</div>
	</body>
</html>