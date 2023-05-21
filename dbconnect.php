<?php 
// connect to database.
$dbconnect = mysqli_connect('localhost', 'root', '', 'votingsystem' );

// Test database connection.
if(!$dbconnect){
    echo "Database error" .mysqli_connect_error(); 
}else{
  // echo "<p style='color: black;'> Database connected</p>";
}
?>