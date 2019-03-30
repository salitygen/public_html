<?php
defined('EXEC') or die;
?>
<html>
	<head>
	<link href="/site/them/css/style.css" rel="stylesheet">
	</head>
	<body>
		<form action="/?task=login" method="POST">
			<label>Login</label>
			<input type="text" name="login">
			<label>Password</label>
			<input type="password" name="password">
			<button type="submit">Войти</button>
		</form>
	</body>
</html>