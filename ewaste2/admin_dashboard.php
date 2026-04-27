<?php
// Start session
session_start();

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ewaste";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Update request status if 'Approve' or 'Reject' button is clicked
if (isset($_POST['approve'])) {
  $request_id = $_POST['request_id'];
  $sql = "UPDATE sell_request SET status='Approved' WHERE request_id='$request_id'";
  mysqli_query($conn, $sql);
} else if (isset($_POST['reject'])) {
  $request_id = $_POST['request_id'];
  $sql = "UPDATE sell_request SET status='Rejected' WHERE request_id='$request_id'";
  mysqli_query($conn, $sql);
}

// Retrieve pickup requests from database and sort by request ID in ascending order
$sql = "SELECT * FROM sell_request ORDER BY request_id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - E-Waste Selling</title>
  <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="admin_login.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <div class="container">
    <h1>Pickup Requests</h1>
    <table>
      <thead>
        <tr>
          <th>Request ID</th>
          <th>User</th>
          <th>Address</th>
          <th>Pickup_date</th>
		  <th>Pickup_Time</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row['request_id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['address']; ?></td>
          <td><?php echo $row['pickup_date']; ?></td>
		   <td><?php echo $row['pickup_time']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td>
            <?php if ($row['status'] === 'Pending') { ?>
            <form method="post" action="">
              <input type="hidden" name="request_id" value="<?php echo $row['request_id']; ?>">
              <button type="submit" name="approve">Approve</button>
              <button type="submit" name="reject">Reject</button>
            </form>
            <?php } ?>
            
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
	<h1> General Queries by the customers </h1>
    <div class="complaints">
	<?php 
	$sqll = "SELECT * FROM contacts";
$done = mysqli_query($conn, $sqll);
?>
<table>
<thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
		 </tr>
</thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($done)) { ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['message']; ?></td>
		<?php } ?>
		 </tr>
		 </tbody>
		 </table>
  </div>
</body>
</html>
