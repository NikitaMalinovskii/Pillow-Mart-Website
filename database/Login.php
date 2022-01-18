<?php 

session_start();


// Add database connection
require_once './DBController.php';

// Create db object
$db = new DBController();

// Get data from login form
$username = $_POST['username'];
$password = md5($_POST['password']);

// Select user with entered data
$check_user = $db->connection->query("SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'");

// If user exists
if(mysqli_num_rows($check_user) > 0) {

    // Get user
    $user = mysqli_fetch_assoc($check_user);

    // Set session variable 
    $_SESSION['user'] = [
        'id' => $user['id'],
        'username' => $user['username'],
        'email' => $user['email'],
        'role' => $user['role'],
    ];

    

    if($_SESSION['user']['role'] == 0){
        // Redirect to profile
        header('Location: ../profile.php');   
    } else {
        header('Location: ../admin/dashboard.php');
    }
    
    
    
} else {

    // Error message
    $_SESSION['msg'] = 'Неверный пароль или имя пользователя';
    header('Location: ../login.php');
};