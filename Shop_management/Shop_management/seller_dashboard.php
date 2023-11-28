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

// Fetch all product data
$sql_p = "SELECT * FROM product";
$result = mysqli_query($conn, $sql_p);

$productData = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productData[] = $row;
    }
}


$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM userdata WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);

echo "<fieldset>";
echo "<h1>Seller Profile</h1>";
echo "<p>Name: " . $row['fname'] . "</p>";
echo "<p>Email: " . $row['email'] . "</p>";
echo "<p>Loged as: " . $row['usertype'] . "</p>";

?>
<fieldset>
   <button onclick="window.location.href='index.php'">Home</button>
   <button onclick="window.location.href='seller_porfile_update.php'">Edit Profile</button>
   <button onclick="window.location.href='s_all_product.php'">All Products</button>
   <button onclick="window.location.href='my_selles.php'">My Selles</button>
    <button onclick="window.location.href='log_out.php'">Log Out</button>
</fieldset>


<?php


echo "</div>";
} else {
echo "<h1>No user found</h1>";
}
?>
</body>
<fieldset>
<h3>Available Products</h3>
<table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Category</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productData as $product) { ?>
            <tr>
                <td><?php echo $product['product_id']; ?></td>
                <td><?php echo $product['product_category']; ?></td>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['product_price']; ?></td>
                <td><img src="uploads/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>" width="100px"></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>


</fieldset>
<?php require 'footer.php' ?>
</html>

