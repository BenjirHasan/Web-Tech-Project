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

session_start();


// Fetch all user data
$sql = "SELECT * FROM userdata";
$result = mysqli_query($conn, $sql);

$userData = [];
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $userData[] = $row;
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head><fieldset>
  <title>Admin Panel</title>
  <style>
  </style></fieldset>
</head>
<body>
    <fieldset>
  <h1>Welcome, <?php echo $_SESSION['fname']; ?> (Admin)</h1>
  <table>
    <thead>
      <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>User Type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($userData as $user) { ?>
        <tr>
          <td><?php echo $user['user_id']; ?></td>
          <td><?php echo $user['fname']; ?></td>
          <td><?php echo $user['lname']; ?></td>
          <td><?php echo $user['email']; ?></td>
          <td><?php echo $user['usertype']; ?></td>
          <td>
          
            <a href="edit_profile.php<?php echo $user['user_id']; ?>">Edit</a>
            <a href="delete_user.php?id=<?php echo $user['user_id']; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <br>
<br>
<br>

   <button onclick="window.location.href='admin_dashboard.php'" >Back</button>
<br>
<br>
<br>
      </fieldset>

  <?php require 'footer.php'; ?>
</body>
</html>
