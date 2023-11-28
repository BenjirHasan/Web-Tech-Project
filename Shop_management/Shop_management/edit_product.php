<?php
include 'loged_header.php';

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "fashion_db";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $product_category = $_POST['product_category'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $sql = "UPDATE product SET product_category='$product_category', product_name='$product_name', product_price='$product_price' WHERE product_id='$product_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>

<fieldset>
    <legend>Update Product</legend>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="product_id">Product ID:</label><br>
        <input type="text" id="product_id" name="product_id" required><br>

        <label for="product_category">Product Category:</label><br>
        <select id="product_category" name="product_category">
            <option value="Clothing">Clothing</option>
            <option value="Bags">Bags</option>
            <option value="Shoes">Shoes</option>
        </select><br>

        <label for="product_name">Product Name:</label><br>
        <input type="text" id="product_name" name="product_name" required><br>

        <label for="product_price">Product Price:</label><br>
        <input type="number" id="product_price" name="product_price" required><br><br>

        <input type="submit" name="submit" value="Update Product"><br>
    </form>
    
<br>
<br>
<br>

   <button onclick="window.location.href='admin_dashboard.php'" >Back</button>
<br>
<br>
<br>
</fieldset>


</body>
</html>
<?php include 'footer.php'; ?>
