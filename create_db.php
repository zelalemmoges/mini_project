<?php
require 'cmsql.php';

$sql = "CREATE TABLE IF NOT EXISTS teacherRegistration (
    ID INT NOT NULL AUTO_INCREMENT,
    fname VARCHAR(100) NOT NULL,
    lname VARCHAR(100) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    PRIMARY KEY (ID)
)";
if (mysqli_query($conn, $sql)) {
    echo "✅ Table created or already exists.";
} else {
    echo "❌ Error: " . mysqli_error($conn);
}
?>


