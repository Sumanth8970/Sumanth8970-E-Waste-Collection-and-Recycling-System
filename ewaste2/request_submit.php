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
// Generate unique request ID
$request_id = uniqid();
// Get form data from POST request
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$product_name = $_POST['product_name'];
$pickup_date = $_POST['pickup_date'];
$pickup_time = $_POST['pickup_time'];

// Insert data into database
$sql = "INSERT INTO sell_request(name, email, address, city, state, zip, product_name, pickup_date, pickup_time, status,request_id) VALUES ('$name', '$email', '$address', '$city', '$state', '$zip', '$product_name', '$pickup_date', '$pickup_time', 'Pending','$request_id')";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Request ID - E-Waste Selling</title>
  <link rel="stylesheet" href="rr.css">
  <meta http-equiv="refresh" content="10000;url=sellings.php">
  <style>
    /* Reset */
/* Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body Styling */
body {
  font-family: Arial, sans-serif;
  /* soft white + pale blue background to give depth behind the glass */
  background: linear-gradient(135deg, #f8fbff 0%, #eef7ff 100%);
  height: 100vh;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

/* Decorative subtle diagonal lines (optional, low-contrast) */
body::before {
  content: "";
  position: absolute;
  inset: 0;
  background-image: linear-gradient(135deg, rgba(33,150,243,0.03) 25%, transparent 25%),
                    linear-gradient(225deg, rgba(33,150,243,0.03) 25%, transparent 25%);
  background-size: 40px 40px;
  pointer-events: none;
  z-index: 0;
}

/* Header Navigation - glassmorphic */
nav {
  position: absolute;
  top: 18px;
  left: 18px;
  padding: 12px 22px;
  border-radius: 14px;
  /* translucent white with bluish tint */
  background: rgba(255, 255, 255, 0.18);
  border: 1px solid rgba(255, 255, 255, 0.35);
  backdrop-filter: blur(10px) saturate(120%);
  -webkit-backdrop-filter: blur(10px) saturate(120%);
  box-shadow: 0 6px 18px rgba(13, 71, 161, 0.06);
  z-index: 5;
}

nav ul {
  list-style: none;
  display: flex;
  gap: 20px;
  align-items: center;
}

nav ul li a {
  text-decoration: none;
  font-size: 18px;
  color: #0d47a1; /* deep blue text to remain visible on glass */
  font-weight: 700;
  transition: color 0.22s ease, transform 0.18s ease;
  padding: 6px 10px;
  border-radius: 8px;
}

nav ul li a:hover {
  color: #fff;
  background: linear-gradient(90deg, rgba(25,118,210,0.95), rgba(13,71,161,0.95));
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(13,71,161,0.14);
}

/* Center Container - glass card */
.container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: min(880px, 92%);
  background: linear-gradient(180deg, rgba(255,255,255,0.32), rgba(255,255,255,0.18));
  padding: 40px 60px;
  border-radius: 18px;
  text-align: center;
  /* frosted blur */
  backdrop-filter: blur(12px) saturate(120%);
  -webkit-backdrop-filter: blur(12px) saturate(120%);
  /* subtle border and glow line */
  border: 1px solid rgba(255, 255, 255, 0.45);
  box-shadow:
    0 8px 30px rgba(13,71,161,0.08),
    inset 0 1px 0 rgba(255,255,255,0.45);
  z-index: 3;
  animation: fadeIn 0.7s ease-in-out;
}

/* Accent outline (thin blue stroke outside the card) */
.container::after {
  content: "";
  position: absolute;
  inset: -6px;
  left: 50%;
  transform: translateX(-50%);
  width: calc(100% - 0px);
  height: calc(100% - 0px);
  border-radius: 22px;
  pointer-events: none;
  background: linear-gradient(90deg, rgba(33,150,243,0.06), rgba(13,71,161,0.06));
  z-index: -1;
}

/* Headings & text */
.container h1 {
  color: #0d47a1;
  font-size: 30px;
  margin-bottom: 12px;
}

.container p {
  color: #08306b;
  font-size: 40px;
  font-weight: 700;
  letter-spacing: 1px;
  background: linear-gradient(180deg, rgba(227,242,253,0.85), rgba(227,242,253,0.6));
  padding: 10px 22px;
  border-radius: 10px;
  display: inline-block;
  border: 1px solid rgba(33,150,243,0.25);
  box-shadow: 0 6px 12px rgba(13,71,161,0.04);
}

/* Copy Button - glassy filled style */
#copyBtn {
  margin-top: 20px;
  padding: 10px 25px;
  font-size: 16px;
  font-weight: 700;
  cursor: pointer;
  color: #ffffff;
  background: linear-gradient(90deg, #1976d2, #0d47a1);
  border: none;
  border-radius: 10px;
  transition: transform 0.18s ease, box-shadow 0.18s ease;
  box-shadow: 0 8px 20px rgba(13,71,161,0.12);
}

#copyBtn:hover {
  transform: translateY(-3px);
  box-shadow: 0 14px 30px rgba(13,71,161,0.16);
}

/* Copy Message Popup */
#copyMessage {
  position: absolute;
  left: 50%;
  top: 105%;
  transform: translate(-50%, 0);
  background: linear-gradient(90deg, #0d47a1, #1976d2);
  color: white;
  padding: 8px 15px;
  border-radius: 10px;
  font-size: 14px;
  opacity: 0;
  pointer-events: none;
  transition: 0.25s ease;
  box-shadow: 0 10px 26px rgba(13,71,161,0.12);
}

/* Responsive tweaks */
@media (max-width: 520px) {
  .container {
    padding: 28px 20px;
  }
  .container p {
    font-size: 28px;
  }
  nav { top: 12px; left: 12px; padding: 10px 16px; }
  nav ul li a { font-size: 16px; padding: 6px 8px; }
}

/* Fade animation */
@keyframes fadeIn {
  from { opacity: 0; transform: translate(-50%, -60%); }
  to { opacity: 1; transform: translate(-50%, -50%); }
}



  </style>

</head>
<body>
  <header>
  <nav>
    <ul>
      <li><a href="status.php">Status</a></li>
      
	  <li><a href="sellings.php">Home</a></li>
	  
    </ul>
  </nav>
  <div class="container">
    <h1>Your Request ID:</h1>
    <p><?php echo $request_id; ?></p>
    <button id="copyBtn">Copy ID</button>
<div id="copyMessage">Copied!</div>

  </div>
  <script>
document.getElementById("copyBtn").addEventListener("click", function () {
    const idText = "<?php echo $request_id; ?>";
    navigator.clipboard.writeText(idText);

    // Show popup message
    const msg = document.getElementById("copyMessage");
    msg.style.opacity = "1";
    msg.style.transform = "translate(-50%, -10px)";

    // Hide after 1 second
    setTimeout(() => {
        msg.style.opacity = "0";
        msg.style.transform = "translate(-50%, 0)";
    }, 1000);
});
</script>

</body>
</html>
