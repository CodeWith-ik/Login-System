<?php
include 'db.php';
include 'navbar.php'; // Include navbar


if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<head>
    <title>Admin Dashboard</title>
</head>

<div class="container mt-4">
  <h1>Welcome, Admin! <b class="text-success"><?php echo $_SESSION["username"] ?></b></h1>
</div>


</div>
