<?php

session_start();

unset($_SESSION['firstnaame']);
unset($_SESSION['surname'] );
unset($_SESSION['id'] );
unset($_SESSION['phonenumber']);
unset($_SESSION['password'] );

// Redirect
header('Location: login.php');

?>