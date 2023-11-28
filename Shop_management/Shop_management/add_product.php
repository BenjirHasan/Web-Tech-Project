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

if (isset($_POST['submit'])) {
// Get form data
$product_category = $_POST['product_category'];
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_POST['product_image'];

// Check if product name already exists in the database
$sql = "SELECT * FROM product WHERE product_name='$product_name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
$product_name_error = "Product name already exists";
} else {
// Insert form data into database
$sql = "INSERT INTO product (product_category, product_name, product_price, product_image) VALUES ('$product_category', '$product_name', '$product_price', '$product_image')";

if (mysqli_query($conn, $sql)) {
echo "Product added successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}

// //Upload photo in path

// if (isset($_FILES['product_image'])) {
//     $product_image_filename = $_FILES['product_image']['name'];
//     $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
//     $product_image_size = $_FILES['product_image']['size'];
//     $product_image_error = $_FILES['product_image']['error'];
//     $product_image_type = $_FILES['product_image']['type'];

//     // Check for image upload errors
//     if ($product_image_error !== 0) {
//         $product_image_error = "Failed to upload product image: " . $product_image_error;
//     } else {
//         // Check file size limit
//         if ($product_image_size > 5000000) {
//             $product_image_error = "Product image size must not exceed 5MB";
//         } else {
//             // Check allowed file types
//             $allowed_image_types = ['image/jpeg', 'image/png', 'image/gif'];
//             if (!in_array($product_image_type, $allowed_image_types)) {
//                 $product_image_error = "Only JPEG, PNG, and GIF images are allowed";
//             } else {
//                 // Generate a unique filename for the uploaded image
//                 $unique_filename = uniqid() . "." . strtolower(pathinfo($product_image_filename, PATHINFO_EXTENSION));

//                 // Move the uploaded image to the 'uploads' folder
//                 $upload_path = "uploads/" . $unique_filename;
//                 if (!move_uploaded_file($product_image_tmp_name, $upload_path)) {
//                     $product_image_error = "Failed to save product image";
//                 } else {
//                     // Use the unique filename in the database
//                     $product_image = $unique_filename;
//                 }
//             }
//         }
//     }
// }



// Close database connection
mysqli_close($conn);
?>

<html>
<head>
<title>Add Product Form</title>

</head>
<body>

<fieldset>
<legend>Add Product Form</legend>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<label for="product_category">Product Category:</label><br>
<select name="product_category" id="product_category">
<option value="clothing">Clothing</option>
<option value="shoes">Shoes</option>
<option value="bags">Bags</option>
</select><br>

<label for="product_name">Product Name:</label><br>
<input type="text" id="product_name" name="product_name" placeholder="Enter Product Name" required><br>
<?php if (isset($product_name_error)) echo $product_name_error; ?>

<label for="product_price">Product Price:</label><br>
<input type="number" id="product_price" name="product_price" placeholder="Enter Product Price" required><br>

<label for="product_image">Product Image:</label><br>
<input type="file" id="product_image" name="product_image" placeholder="Upload Product Image" required><br>

<br>
<input type="submit" name="submit" value="Submit">

<br>
<br>
<br>

   <button onclick="window.location.href='admin_dashboard.php'" >Back</button>
<br>
<br>
<br>

</form>
</fieldset>

<?php include 'footer.php'; ?>

</body>
</html>
