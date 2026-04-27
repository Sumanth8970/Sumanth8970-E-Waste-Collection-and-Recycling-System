<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "ewaste");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if (isset($_POST['submit'])) {

    $holder = $_POST['holder_name'];
    $account = $_POST['account_number'];
    $ifsc = $_POST['ifsc_code'];

    $sql = "INSERT INTO payment (holder_name, account_number, ifsc_code)
            VALUES ('$holder', '$account', '$ifsc')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Payment details submitted successfully!');
                window.location.href = 'seller_request.php';
              </script>";
        exit();
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Section</title>

<style>
    body{
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #20b45eff, #64dd17);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container{
        background: #ffffff;
        padding: 30px;
        width: 380px;
        border-radius: 12px;
        box-shadow: 0px 6px 20px rgba(0,0,0,0.2);
        animation: fadeIn 0.8s ease-in-out;
    }

    h2{
        text-align: center;
        color: #00a844;
        margin-bottom: 20px;
    }

    label{
        font-size: 14px;
        font-weight: bold;
    }

    input[type=text]{
        width: 100%;
        padding: 10px;
        border: 2px solid #00c853;
        border-radius: 8px;
        outline: none;
        margin-top: 5px;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    input[type=text]:focus{
        border-color: #007e33;
        box-shadow: 0px 0px 6px rgba(0, 150, 50, 0.5);
    }

    button{
        width: 100%;
        padding: 12px;
        background: #00c853;
        border: none;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover{
        background: #009624;
        transform: scale(1.03);
    }

    .msg{
        text-align: center;
        font-weight: bold;
        color: #004d1a;
        background: #c8f7dc;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
        border-left: 4px solid #00a844;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

</head>
<body>

<div class="container">

<h2>Enter Bank Details</h2>

<?php if ($message) { echo "<div class='msg'>$message</div>"; } ?>

<form method="POST">
    <label>Bank Holder Name:</label>
    <input type="text" name="holder_name" required>

    <label>Account Number:</label>
    <input type="text" name="account_number" required>

    <label>IFSC Code:</label>
    <input type="text" name="ifsc_code" required>

    <button type="submit" name="submit">Submit</button>
</form>

</div>

</body>
</html>
