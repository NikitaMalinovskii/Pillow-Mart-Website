<?php

session_start();

// Add database connection
require_once './DBController.php';

// Create db object
$db = new DBController();


// Get data from register form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['con-password'];


// If passwords matches
if ($password == $confirm_password) {

    // Hash password
    $password = md5($password);

    // Execute query
    $db->connection->query(
        "INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) 
        VALUES (NULL, '$username', '$email', '$password', 0)");

    // Set message to user
    $_SESSION['msg'] = 'Registration successful!';

    // Redirect to log in
    header('Location: ../login.php');

} else {

    // Error message
    $_SESSION['msg'] = 'Пароли не совпадают';
    header('Location: ../register.php');
}
