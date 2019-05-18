<?php
defined('EXEC') or die;
?>
<html>
	<head>
	<link href="/login/css/style.css" rel="stylesheet">
	</head>
	<body>
		<form action="/?task=login" method="POST">
			<label>Login</label>
			<input type="text" name="login">
			<label>Password</label>
			<input type="password" name="password">
			<input type="hidden" name="csrf" value="<?php print $main->csrf; ?>">
			<button type="submit">Войти</button>
		</form>
	</body>
</html>