<?php
    // Connect to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'ewaste';
    $conn = mysqli_connect($host, $user, $password, $database);
    // Check for connection errors
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['login'])){
        // Get the user data from the form
        $username =$_POST['username'];
        $password =$_POST['password'];

        // Get the user from the database
        $query = "SELECT * FROM admin WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if($password==$user['password']){
            header('Location:admin_dashboard.php');
        }
        else{
            echo "Invalid email or password.";
        }
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
    background: linear-gradient(135deg, #95dddaff, #5b7cceff);
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
    <p><a href="admin_login.php">Try Again</a>.</p>
    
</body>
</html>
