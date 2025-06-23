<?php require 'cmsql.php'; ?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM teacherRegistration WHERE ID='$id'");
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];

    $update_sql = "UPDATE teacherRegistration SET fname='$fname', lname='$lname', gender='$gender' WHERE ID='$id'";
    if (mysqli_query($conn, $update_sql)) {
        header("Location: form.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Teacher</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
<div class="container">
  <h3 class="mb-4">Edit Teacher</h3>
  <form method="post" class="card p-4 shadow">
    <div class="mb-3">
      <label class="form-label">First Name</label>
      <input type="text" name="fname" value="<?php echo $row['fname']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Last Name</label>
      <input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Gender</label>
      <select name="gender" class="form-select" required>
        <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        <option value="Other" <?php if ($row['gender'] == 'Other') echo 'selected'; ?>>Other</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="form.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>

