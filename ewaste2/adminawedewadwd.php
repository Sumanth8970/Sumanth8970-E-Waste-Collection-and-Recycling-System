<?php
 

  

  // Query to retrieve all selling requests
  $sql = "SELECT * FROM sell_requests";
 $conn = mysqli_connect('localhost', 'root', '', 'ewaste');
  // Execute query and get results
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Selling Requests - Admin Panel</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <div class="container">
    <h1>Selling Requests</h1>
    <a href="logout.php" class="logout">Logout</a>
    <table>
      <thead>
        <tr>
          <th>Customer Name</th>
		  <th>Email</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
          <th>Zip</th>
          <th>Product Name</th>
          <th>Product_description</th>
          <th>Product_image</th>
          <th>Pickup_date</th>
		  <th>Pickup_time</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['state']; ?></td>
            <td><?php echo $row['zip']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
			<td><?php echo $row['product_description']; ?></td>
			<td><?php echo $row['product_image']; ?></td>
            <td><?php echo $row['pickup_date']; ?></td>
            <td><?php echo $row['pickup_time']; ?></td>
            <td>
              <?php if($row['status'] == 'Pending'): ?>
                <a href="approve.php?id=<?php echo $row['id']; ?>" class="button">Approve</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
