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
    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender = $_POST['gender'];
    $usertype = 'Customer'; // Set user type to Customer

    // Update user data in the database - modify as needed for your specific use case
    $sql = "UPDATE userdata SET fname='$fname', lname='$lname', password='$password', cpassword='$cpassword', gender='$gender', usertype='$usertype' WHERE email='$email'";

    if (mysqli_query($conn, $sql)) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

// Fetch user data to pre-fill the form fields
$email = $_SESSION['email']; // Assuming you've stored the user's email in the session

$sql = "SELECT * FROM userdata WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $gender = $row['gender'];
    $usertype = $row['usertype'];
    // You can fetch other fields similarly and use them to pre-fill the form
}

?>

<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Edit Profile</title>
</head>
<fieldset>
<body>

<fieldset>
    <button onclick="window.location.href='index.php'">Home</button>
    <button onclick="window.location.href='customer_dashboard.php'">Dashboard</button>
    <button onclick="window.location.href='edit_profile.php'">Edit Profile</button>
    <button onclick="window.location.href='index.php'">My Orders</button>
    <button onclick="window.location.href='log_out.php'">Log Out</button>
</fieldset>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    First Name: <br><input type="text" name="fname" value="<?php echo $fname; ?>"><br>
    Last Name:<br> <input type="text" name="lname" value="<?php echo $lname; ?>"><br>
    Email:<br> <input type="email" name="email" value="<?php echo $email; ?>" readonly><br>
    Password:<br> <input type="password" name="password" value=""><br>
    Confirm Password:<br> <input type="password" name="cpassword" value=""><br>
    Gender:
    <input type="radio" name="gender" value="male" <?php if ($gender == 'male') echo 'checked'; ?>> Male
    <input type="radio" name="gender" value="female" <?php if ($gender == 'female') echo 'checked'; ?>> Female<br>

    <input type="hidden" name="usertype" value="Customer">

    <input type="submit" name="submit" value="Submit">

</form>

<br>
<br>

<button onclick="window.location.href='customer_dashboard.php'">Back to Dashboard</button>
<br>
<br>
<br>
</body>
</html>

<?php
mysqli_close($conn);
include 'footer.php';
?>
