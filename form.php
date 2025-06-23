<?php require 'cmsql.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Teacher Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-light">

<div class="container py-5">
  <h2 class="mb-4 text-center">Teacher Registration</h2>

  <!-- Form -->
  <div class="card mb-5 shadow">
    <div class="card-body">
      <form method="post" action="form.php">
        <div class="mb-3">
          <label class="form-label">First Name</label>
          <input type="text" name="fname" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Last Name</label>
          <input type="text" name="lname" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Gender</label>
          <select name="gender" class="form-select" required>
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
    </div>
  </div>

  <!-- PHP Insert Logic -->
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $fname = mysqli_real_escape_string($conn, $_POST['fname']);
      $lname = mysqli_real_escape_string($conn, $_POST['lname']);
      $gender = mysqli_real_escape_string($conn, $_POST['gender']);

      $sql = "INSERT INTO teacherRegistration (fname, lname, gender)
              VALUES ('$fname', '$lname', '$gender')";

      if (mysqli_query($conn, $sql)) {
          echo "<div class='alert alert-success'>✅ Record added!</div>";
      } else {
          echo "<div class='alert alert-danger'>❌ " . mysqli_error($conn) . "</div>";
      }
  }
  ?>

  <!-- Display Table -->
  <h4 class="mb-3">Registered Teachers</h4>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Edit</th><th>Delete</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $result = mysqli_query($conn, "SELECT * FROM teacherRegistration");
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                  <td>{$row['ID']}</td>
                  <td>{$row['fname']}</td>
                  <td>{$row['lname']}</td>
                  <td>{$row['gender']}</td>
                  <td><a class='btn btn-warning btn-sm' href='edit.php?id={$row['ID']}'>Edit</a></td>
                  <td><a class='btn btn-danger btn-sm' href='delete.php?id={$row['ID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
              </tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No records found.</td></tr>";
      }
      ?>
      </tbody>
    </table>
  </div>
</div>

<script src="assets/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php mysqli_close($conn); ?>

