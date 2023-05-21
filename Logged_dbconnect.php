<?php 



    // Test database connection.
    if(!$dbconnect){
        echo "Database error" .mysqli_connect_error(); 
    }else{
    
    $firstname = $_SESSION['First Name'];
    $surname = $_SESSION['Surname'];

    }

    if(!isset($_SESSION['First Name'])) {
        // Redirect to login page.

        // header('Location: login.php');
    }  

?>