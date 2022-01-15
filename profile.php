<?php 
session_start();

if(!$_SESSION['user']){
    header('Location: ./index.php');
}
include './header.php' 
?>

<?php include './templates/ProfileTemplate.php' ?>

<?php include './footer.php'?>