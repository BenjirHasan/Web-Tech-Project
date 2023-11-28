<?php include 'header.php'; ?>

<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "fashion_db";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
    
    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender = $_POST['gender'];
    $usertype = $_POST['usertype'];
    
    // Check if email already exists in the database
    $sql = "SELECT * FROM userdata WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $email_error = "Email already exists";
    }
    else{
        // Insert form data into database
        $sql = "INSERT INTO userdata (fname, lname, email, password, cpassword, gender,usertype) VALUES ('$fname', '$lname', '$email', '$password', '$cpassword', '$gender','$usertype')";
        
        if(mysqli_query($conn, $sql)){
            echo "Registration successful";
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close database connection
mysqli_close($conn);
?>
<html><fieldset>
<head>
    <title>Registration Form</title>
   
</head>
<body><fieldset>
        <legend>Registration Form</legend>
            <p>Please fill in this form to create an account.</p>
        
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                
                <legend> <label for="fname">First Name</label><br>
                    <input type="text" id="fname" name="fname" placeholder="Enter your name" required><br>
                    <?php if(isset($fname_error)) echo $fname_error; ?> </legend><br>
                    <legend><label for="lname">Last Name</label><br>
                    <input type="text" id="lname" name="lname" placeholder="Enter your name" required><br>
                    <?php if(isset($lname_error)) echo $lname_error; ?></legend> <br>
        
                    <legend><label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                    <?php if(isset($email_error)) echo $email_error; ?></legend> <br>
            
                    <legend><label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <?php if(isset($password_error)) echo $password_error; ?></legend><br>
            
                    <legend><label for="cpassword">Confirm Password</label><br>
                    <input type="password" id ="cpassword"name ="cpassword" placeholder ="Enter your password again"" required >
                    <?php if(isset($cpassword_error)) echo $cpassword_error; ?></legend>
                    
                        <legend><label for="gender">Gender</label></legend>
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" required>
                        <label for="female">Female</label>
                        <br>

                        <legend><label for="usertype">User Type</label></legend>
                    <input type="radio" id="customer" name="usertype" value="Customer" required>
                    <label for="customer">Customer</label>
                    <input type="radio" id="seller" name="usertype" value="Seller" required>
                    <label for="seller">Seller</label>
                    <input type="radio" id="admin" name="usertype" value="Admin" required>
                    <label for="admin">Admin</label>

      </fieldset>
<fieldset>
<br>
    <input type="submit" name="submit" value="Submit">
</fieldset>
</body></fieldset>
</html>
 <?php include 'footer.php'; ?>

           
            
