<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ewaste";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$sql = "INSERT INTO contacts (name, email, message)
VALUES ('$name', '$email', '$message')";

if (mysqli_query($conn, $sql)) {
  echo "your query has been submitted sucessfully!";
  header('Location:home_page.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
