<?php
  require 'cmsql.php';
//  $sql = "CREATE DATABASE form_data";
//  if (mysqli_query($conn, $sql)) {
//     echo"database created successfully<br />";
//  } else{
//     echo "Error creating database" . mysqli_error($conn). "<br />";
//  }


$sql = "CREATE TABLE teacherRegistration(
ID INT NOT NULL AUTO_INCREMENT, 
fname VARCHAR(100) NOT NULL,
lname VARCHAR(100) NOT NULL,
gender VARCHAR(10) NOT NULL,
PRIMARY KEY (ID)
);";

mysqli_select_db($conn, 'teacher');
$qur = mysqli_query($conn, $sql);

if (!$qur){
    die('could not create table: '. mysqli_error($conn,));
}

echo "table created sucessfully<br />";

// ...

// Add edit and delete functionality
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Edit functionality
    if (isset($_POST["edit"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $gender = $_POST["gender"];

        $update_sql = "UPDATE teacherRegistration SET fname='$fname', lname='$lname', gender='$gender' WHERE ID='$id'";
        if (mysqli_query($conn, $update_sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: ".mysqli_error($conn);
        }
    }

    // Delete functionality
    if (isset($_POST["delete"])) {
        $delete_sql = "DELETE FROM teacherRegistration WHERE ID='$id'";
        if (mysqli_query($conn, $delete_sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: ".mysqli_error($conn);
        }
    }
}

// ...

mysqli_close($conn);


?>