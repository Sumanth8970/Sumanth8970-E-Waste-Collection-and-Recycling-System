<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>User Login - E-Waste Selling</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container">
    <h1>User Login</h1>
    <form method="post" action="logins.php">
      <label for="email">Email ID:</label>
      <input type="text" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <button type="submit" id="submit"name="submit">Login</button>
    </form>
	<div class="hi">
	 <p>Don't have an account? <a href="registeration.php">Register here</a>.</p>
	 <p><a href="admin_login.php">Admin_login </a>.</p>
	 </div>
  </div>
</body>
</html>
