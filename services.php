<?php
include 'db.php';
include 'navbar.php'; // Include navbar


if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
?>


<head>  
    <title>Service</title>
</head>