<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Raise Pickup Request - E-Waste Selling</title>
  <link rel="stylesheet" href="seller_request.css">
</head>
<body>
  <div class="container">
    <h1>Raise Pickup Request</h1>
    <form action="request_submit.php" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required>

      <label for="city">City:</label>
      <input type="text" id="city" name="city" required>

      <label for="state">State:</label>
      <input type="text" id="state" name="state" required>

      <label for="zip">ZIP:</label>
      <input type="text" id="zip" name="zip" required>

      <label for="product_name">Product Name:</label>
      <input type="text" id="product_name" name="product_name" required>

      <label for="pickup_date">Pickup Date:</label>
      <input type="date" id="pickup_date" name="pickup_date" required>

      <label for="pickup_time">Pickup Time:</label>
      <input type="time" id="pickup_time" name="pickup_time" required>

      <input type="submit" value="Submit Request" class="submit-button">
    </form>
  </div>
</body>
</html>
