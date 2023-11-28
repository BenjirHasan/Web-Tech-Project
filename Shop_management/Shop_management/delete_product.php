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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $product_id = $_POST['product_id'];

    $sql = "DELETE FROM product WHERE product_id='$product_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
</head>
<body>
    <fieldset>
        <legend>Delete Product</legend>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="product_id">Product ID:</label><br>
            <input type="text" id="product_id" name="product_id" required><br>

            <input type="submit" name="delete" value="Delete Product"><br>
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
