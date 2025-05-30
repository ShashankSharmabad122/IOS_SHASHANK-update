<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Check for remember me cookie
    if (isset($_COOKIE['remember_token'])) {
        // Include database configuration
        require_once 'config.php';
        
        $token = $_COOKIE['remember_token'];
        
        $stmt = $db->prepare("SELECT * FROM users WHERE remember_token = :token");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
        } else {
            // Not logged in, redirect to login page
            header('Location: login.php');
            exit;
        }
    } else {
        // Not logged in, redirect to login page
        header('Location: login.html');
        exit;
    }
}
?>