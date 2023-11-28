<?php
// Initialize the session
session_start();

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the home page
header("Location: index.php"); // Change 'index.php' to your home page URL
exit();
?>
