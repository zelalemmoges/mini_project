<?php
require "Cmsql.php"; // This file should establish your DB connection and assign it to $conn

// Define your query correctly
$sql = "SELECT id, fname, lname, gender FROM teacherRegistration";

// Select the database (optional if already selected in Cmsql.php)
mysqli_select_db($conn, "teacher");

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    die("Could not get data: " . mysqli_error($conn));
} else {
    echo "Data retrieved successfully<br><br>";
}

// Fetch and display the results
while ($row = mysqli_fetch_array($result)) {
    echo "ID: " . $row["id"] . "<br>";
    echo "First Name: " . $row["fname"] . "<br>";
    echo "Last Name: " . $row["lname"] . "<br>";
    echo "Gender: " . $row["gender"] . "<br>";
    echo "--------------------------<br><br>";
}

echo "Fetched data successfully";

// Close the connection
mysqli_close($conn);
?>