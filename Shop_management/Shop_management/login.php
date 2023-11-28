<?php
include 'header.php';

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "fashion_db";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

$remember = isset($_POST['remember']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM userdata WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $email;
            $userType = $row['usertype'];

            if ($remember) {
                setcookie('remember_me', $email, time() + 60 * 60 * 24 * 7, '/'); // Expires in 7 days
            }

            if ($userType === 'Admin') {
                header("Location: admin_dashboard.php");
                exit();
            } elseif ($userType === 'Seller') {
                header("Location: seller_dashboard.php");
                exit();
            } elseif ($userType === 'customer') {
                header("Location: customer_dashboard.php");
                exit();
            }
        } else {
            $error = "Invalid Email or Password";
        }
    }
}

mysqli_close($conn);

if (isset($_COOKIE['remember_me'])) {
    $email = $_COOKIE['remember_me'];
    $_POST['email'] = $email; // Pre-fill the email field
}
?>

<!DOCTYPE html>
<html>
<fieldset>
<head>
    <title>Log In</title>
</head>
<body>
<fieldset>
    <form action="login.php" method="post">
        <label for="email"><b>E-Mail</b></label><br>
        <input type="text" placeholder="Enter Email" name="email" required value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>"><br>
        <label for="password"><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="password" required><br><br>
        <button type="submit">Login</button>
        <label>
            <input type="checkbox" name="remember" <?php if ($remember) { echo 'checked'; } ?>> Remember me
        </label>
    </form>
    <?php if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    } ?>
</fieldset>
<?php require 'footer.php'; ?>
</body>
</fieldset>
</html>
