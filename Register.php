<?php
include 'db.php';
include 'navbar.php'; // Include navbar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";
    if (mysqli_query($conn, $query)) {
      echo "<script>
          alert('Registration successful! You will be redirected to the login page.');
          window.location.href = 'login.php';
      </script>";
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
}
?>

<div class="container border p-5 w-50 h-100 rounded bg-light mb-5"  style="margin-top:100px;">
  <h2 style="margin-bottom:100px;">Register</h2>
  <form action="Register.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-select" id="role" name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary mt-5">Register</button>
  </form>
</div>
