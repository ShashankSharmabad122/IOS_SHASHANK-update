<?php
// Include database configuration
require_once 'config.php';

// Test the connection
try {
    // Try to execute a simple query
    $stmt = $db->query("SELECT 1");
    echo "Database connection successful!<br>";
    
    // Check if users table exists and has records
    $stmt = $db->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() > 0) {
        echo "Users table exists.<br>";
        
        // Count users
        $stmt = $db->query("SELECT COUNT(*) as user_count FROM users");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "Number of users in database: " . $result['user_count'] . "<br>";
    } else {
        echo "Users table does not exist. You may need to run the database setup script.<br>";
        echo "<a href='db_setup.php'>Run Database Setup</a>";
    }
    
} catch(PDOException $e) {
    echo "Database connection failed: " . $e->getMessage() . "<br>";
    echo "Please check your database configuration in config.php";
}

// Display link to login page
echo "<br><br><a href='login.html'>Go to Login Page</a>";
?>