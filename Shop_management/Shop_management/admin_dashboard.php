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
echo "<h1>Admin Profile</h1>";
echo "<p>Name: " . $row['fname'] . "</p>";
echo "<p>Email: " . $row['email'] . "</p>";
echo "<p>Loged as: " . $row['usertype'] . "</p>";

?>
<fieldset>
   <button onclick="window.location.href='index.php'">Home</button>
   <button onclick="window.location.href='admin_profile_update.php'">Edit Profile</button>
   <button onclick="window.location.href='view_product.php'">View Product</button>
   <button onclick="window.location.href='add_product.php'">Add Product</button>
   <button onclick="window.location.href='delete_product.php'">Delete Product</button>
   <button onclick="window.location.href='edit_product.php'">Update Product</button>
   <button onclick="window.location.href='view_user.php'">View Uers</button>
    <button onclick="window.location.href='log_out.php'">Log Out</button>
</fieldset>


<?php

echo "</div>";
} else {
echo "<h1>No user found</h1>";
}
?>
</body>
<?php

// Query to get the total number of registered users
$sqlUsers = "SELECT COUNT(*) AS total_users FROM userdata";
$resultUsers = mysqli_query($conn, $sqlUsers);
$rowUsers = mysqli_fetch_assoc($resultUsers);
$totalUsers = $rowUsers['total_users'];

// Query to get the total number of added products
$sqlProducts = "SELECT COUNT(*) AS total_products FROM product";
$resultProducts = mysqli_query($conn, $sqlProducts);
$rowProducts = mysqli_fetch_assoc($resultProducts);
$totalProducts = $rowProducts['total_products'];

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h3>Statistics</h3>
    <fieldset>
        <legend>Statistics</legend>
        <p>Total Registered Users: <?php echo $totalUsers; ?></p>
        <p>Total Added Products: <?php echo $totalProducts; ?></p>
    </fieldset>
</body>
</html>

</fieldset>
<?php require 'footer.php' ?>
</html>

