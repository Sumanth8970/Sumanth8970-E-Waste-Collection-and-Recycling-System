<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="admin_login.css">
</head>
<body>

	<div class="login-box">
		<h2>Admin Login</h2>

		<form action="admins.php" method="post">

			<!-- Username field -->
			<div class="field">
				<input type="text" id="username" name="username" required>
				<label>Username</label>
			</div>

			<!-- Password field -->
			<div class="field">
				<input type="password" name="password" required>
				<label>Password</label>
			</div>

			<input type="submit" name="login" value="Login">

		</form>
	</div>

</body>
</html>
