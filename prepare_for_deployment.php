<?php
/**
 * Deployment Preparation Script
 * 
 * This script helps you prepare your application for deployment by:
 * 1. Creating a deployment-ready version of your database connection files
 * 2. Providing a form to enter your hosting database credentials
 * 3. Generating modified files with your hosting credentials
 */

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get database credentials from form
    $db_host = $_POST['db_host'] ?? 'localhost';
    $db_name = $_POST['db_name'] ?? '';
    $db_user = $_POST['db_user'] ?? '';
    $db_pass = $_POST['db_pass'] ?? '';
    
    if (empty($db_name) || empty($db_user)) {
        $error = "Please provide database name and username";
    } else {
        // Files that need database connection updates
        $files = [
            'auth.php',
            'settings.php',
            'file_manager.php',
            'db_setup.php'
        ];
        
        // Create deployment directory if it doesn't exist
        if (!file_exists('deployment')) {
            mkdir('deployment');
        }
        
        // Process each file
        foreach ($files as $file) {
            if (file_exists($file)) {
                $content = file_get_contents($file);
                
                // Replace database connection details
                $pattern = '/\$host\s*=\s*\'localhost\'\s*;[\s\S]*?\$dbname\s*=\s*\'shashank_os\'\s*;[\s\S]*?\$username\s*=\s*\'root\'\s*;[\s\S]*?\$password\s*=\s*\'\'\s*;/';
                $replacement = "\$host = '$db_host';\n\$dbname = '$db_name';\n\$username = '$db_user';\n\$password = '$db_pass';";
                
                $updated_content = preg_replace($pattern, $replacement, $content);
                
                // Save to deployment directory
                file_put_contents("deployment/$file", $updated_content);
            }
        }
        
        // Copy other files
        $all_files = glob('*.{php,html,css,js,sql}', GLOB_BRACE);
        foreach ($all_files as $file) {
            if (!in_array($file, $files) && $file !== 'prepare_for_deployment.php') {
                copy($file, "deployment/$file");
            }
        }
        
        $success = "Deployment files created successfully in the 'deployment' folder!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prepare for Deployment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .alert-danger {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
        .steps {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Prepare Shashank OS for Deployment</h1>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <?php if (isset($success)): ?>
        <div class="alert alert-success">
            <?php echo $success; ?>
            <p>Follow these steps to deploy your application:</p>
            <ol>
                <li>Upload all files from the 'deployment' folder to your hosting service</li>
                <li>Access your website URL with '/db_setup.php' at the end to set up the database</li>
                <li>Once the database is set up, you can start using your application</li>
            </ol>
        </div>
    <?php endif; ?>
    
    <form method="post" action="">
        <div class="form-group">
            <label for="db_host">Database Host:</label>
            <input type="text" id="db_host" name="db_host" value="localhost" required>
        </div>
        
        <div class="form-group">
            <label for="db_name">Database Name:</label>
            <input type="text" id="db_name" name="db_name" placeholder="Enter your hosting database name" required>
        </div>
        
        <div class="form-group">
            <label for="db_user">Database Username:</label>
            <input type="text" id="db_user" name="db_user" placeholder="Enter your hosting database username" required>
        </div>
        
        <div class="form-group">
            <label for="db_pass">Database Password:</label>
            <input type="password" id="db_pass" name="db_pass" placeholder="Enter your hosting database password" required>
        </div>
        
        <button type="submit">Prepare Files for Deployment</button>
    </form>
    
    <div class="steps">
        <h2>Deployment Steps</h2>
        <ol>
            <li>Sign up for a free hosting service that supports PHP and MySQL</li>
            <li>Create a MySQL database through your hosting control panel</li>
            <li>Enter your database credentials in this form</li>
            <li>Upload the generated files to your hosting service</li>
            <li>Run the database setup script by visiting yourdomain.com/db_setup.php</li>
            <li>Start using your application!</li>
        </ol>
        
        <h3>Recommended Free Hosting Services:</h3>
        <ul>
            <li><a href="https://www.000webhost.com/" target="_blank">000webhost</a></li>
            <li><a href="https://infinityfree.net/" target="_blank">InfinityFree</a></li>
            <li><a href="https://www.awardspace.com/" target="_blank">AwardSpace</a></li>
            <li><a href="https://byet.host/" target="_blank">Byethost</a></li>
        </ul>
    </div>
</body>
</html>