<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Request Status - E-Waste Selling</title>
  <link rel="stylesheet" href="status.css">
</head>
<body>
  <div class="container">
    <h1>Request Status</h1>
    <form method="POST" action="status.php">
      <label for="id">Enter Request ID:</label>
      <input type="text" id="request_id" name="request_id" required>
      <button type="submit">Check Status</button>
    </form>
     </div>


<?php 
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ewaste";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$request_id = $_POST['request_id'];
$sql = "SELECT * FROM sell_request WHERE request_id='$request_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $status = $row["status"];
} else {
  $status = "Invalid request ID";
}

$conn->close();
?>
<div class="status">
      <?php if ($status == "Pending") { ?>
        <p>Your request is still pending. Please wait for our confirmation.</p>
      <?php } else if ($status == "Approved") { ?>
        <p>Your request has been approved. We will pick up your product on the specified date and time.</p>
      <?php } else if ($status == "Rejected") { ?>
        <p>Sorry, we are unable to pick up your product due to some reasons.</p>
      <?php } else { ?>
        <p><?php echo $status; ?></p>
      <?php } ?>
    </div>
</body>
</html>