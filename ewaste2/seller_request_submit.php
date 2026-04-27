<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $product_name = $_POST['product_name'];
  $product_description = $_POST['product_description'];
  $product_image = $_FILES['product_image']['name'];
  $product_image_tmp = $_FILES['product_image']['tmp_name'];
  $pickup_date = $_POST['pickup_date'];
  $pickup_time = $_POST['pickup_time'];

  // Connect to the database
  $conn = mysqli_connect('localhost', 'root', '', 'ewaste');

  // Check if the connection was successful
  if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
  }

  // Upload the product image
  $upload_dir = 'G/';
  $product_image_path = $upload_dir . $product_image;
  move_uploaded_file($product_image_tmp, $product_image_path);

  // Insert the sell request into the database
  $sql = "INSERT INTO sell_requests (name, email, phone, address, city, state, zip, product_name, product_description, product_image, pickup_date, pickup_time) VALUES ('$name', '$email', '$phone', '$address', '$city', '$state', '$zip', '$product_name', '$product_description', '$product_image_path', '$pickup_date', '$pickup_time')";

  if (mysqli_query($conn, $sql)) {
    echo "Sell request submitted successfully!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);

}

?>