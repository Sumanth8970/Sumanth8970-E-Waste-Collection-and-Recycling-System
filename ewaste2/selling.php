<form action="seller_request_submit.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone" required>

  <label for="address">Address:</label>
  <input type="text" id="address" name="address" required>

  <label for="city">City:</label>
  <input type="text" id="city" name="city" required>

  <label for="state">State:</label>
  <input type="text" id="state" name="state" required>

  <label for="zip">Zip:</label>
  <input type="text" id="zip" name="zip" required>

  <label for="product_name">Product Name:</label>
  <input type="text" id="product_name" name="product_name" required>

  <label for="product_description">Product Description:</label>
  <textarea id="product_description" name="product_description" required></textarea>

  <label for="product_image">Product Image:</label>
  <input type="file" id="product_image" name="product_image" required>

  <label for="pickup_date">Pickup Date:</label>
  <input type="date" id="pickup_date" name="pickup_date" required>

  <label for="pickup_time">Pickup Time:</label>
  <input type="time" id="pickup_time" name="pickup_time" required>

  <button type="submit">Sell</button>
</form>