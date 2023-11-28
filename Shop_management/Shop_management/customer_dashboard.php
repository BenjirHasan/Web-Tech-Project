<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>
<link rel="stylesheet" href="style.css">
</head><fieldset>
<body>
<?php
include 'loged_header.php';

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "fashion_db";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}


$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM userdata WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);

echo "<fieldset>";
echo "<h1>User Profile</h1>";
echo "<p>Name: " . $row['fname'] . "</p>";
echo "<p>Email: " . $row['email'] . "</p>";
echo "<p>Loged as: " . $row['usertype'] . "</p>";

?>
<fieldset>
   <button onclick="window.location.href='index.php'">Home</button>
   <button onclick="window.location.href='edit_profile.php'">Edit Profile</button>
   <button onclick="window.location.href='c_view_product.php'">View Products</button>
   <button onclick="window.location.href='my_order.php'">My Orders</button>
    <button onclick="window.location.href='log_out.php'">Log Out</button>
</fieldset>


<?php

echo "</div>";
} else {
echo "<h1>No user found</h1>";
}
?>
        <div class="section">
            <h2>Recent Orders</h2>
            <ul>
                <li>Order 1 - Shirt</li>
                <li>Order 2 - Shoe</li>
                
            </ul>
        </div>
</body>
</fieldset>
<?php require 'footer.php' ?>
</html>

