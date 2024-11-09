<?php
include 'db.php';
include 'navbar.php'; // Include navbar


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] == 'admin') {
                header("Location: adminPanel.php");
            } else {
                header("Location: userPanel.php");
            }
        } else {
            echo '<script>alert("Invalid Password")</script>';
        }
    } else {
        echo '<script>alert("No user found with that username.")</script>';
    }
}
?>

<head>
    <title>Login</title>
</head>

<div class="container border p-5 w-25 h-75 rounded bg-light mb-5" style="margin-top:100px;">
  <h2 class="mb-5">Login</h2>
  <form action="login.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary mt-5">Login</button>
  </form>
</div>
