<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ewaste";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data from POST request
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if username already exists
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  echo "Username already exists";
  exit();
}

// Check if email already exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  echo "Email already exists";
  exit();
}
// Insert data into database
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
  echo "Registration successful";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #c5efdcff, #32a418ff);
}

.login-container {
    background: #71b687ff;
    width: 350px;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    animation: fadeIn 0.8s ease;
}

.login-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-weight: 600;
}

.input-group {
    margin-bottom: 15px;
}

.input-group label {
    font-size: 14px;
    color: #444;
}

.input-group input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    font-size: 15px;
    border: 1px solid #bbb;
    border-radius: 6px;
    outline: none;
    transition: 0.3s;
}

.input-group input:focus {
    border-color: #4c8bf5;
    box-shadow: 0 0 5px rgba(76,139,245,0.4);
}

.btn {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    background: #4c8bf5;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover {
    background: #3a74d8;
}

/* Simple fade-in animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

    </style>
</head>
<body>
    <p> <a href="login.php"> Login </a>  </p>
    
    
</body>
</html>
