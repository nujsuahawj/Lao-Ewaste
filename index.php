
<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: Home.php');
    exit;
}else{
    header('location: Home.php');
    exit;
}
?>