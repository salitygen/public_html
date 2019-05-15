<?php
defined('EXEC') or die;
include $main->root.'/views/controller.php';
CSRF::set();
?>
<html>
	<head>
	<meta charset="utf-8">
	<link href="/panel/css/style.css" rel="stylesheet">
	<link href="/panel/css/fontello.css" rel="stylesheet">
	<script type="text/javascript" src="/panel/js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="/panel/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="/panel/js/masonry.pkgd.min.js"></script>
	<script type="text/javascript" src="/panel/js/packery.pkgd.min.js"></script>
	<script type="text/javascript" src="/panel/js/polling.js"></script>
	<script type="text/javascript" src="/panel/js/main.js"></script>
	</head>
	<body <?php if($main->view == 'settings') print 'class="level2"'; ?>>
		<div id="leftPanel">
		<?php print Render::view($main,'module','menu',false);?>
		</div>
		<div id="dashBoard">
			<?php print Render::view($main,'page',false,true); ?>
		</div>
	</body>
</html>