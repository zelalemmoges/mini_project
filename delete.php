<?php
require 'cmsql.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID.");
}

$id = $_GET['id'];
$sql = "DELETE FROM teacherRegistration WHERE ID='$id'";

if (mysqli_query($conn, $sql)) {
    header("Location: form.php");
    exit;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
