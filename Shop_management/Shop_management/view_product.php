<?php
include 'loged_header.php';

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "fashion_db";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all product data
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

$productData = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productData[] = $row;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
   
</head>
<body>

<fieldset>
    <h1>View Products</h1>

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


    <br>
<br>
<br>

   <button onclick="window.location.href='admin_dashboard.php'" >Back to Dashboard</button>
<br>
<br>
<br>

</fieldset>

<?php require 'footer.php'; ?>
</body>
</html>
