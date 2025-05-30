<?php
session_start();

// Check for error or success messages
$error_message = $_SESSION['error'] ?? '';
$success_message = $_SESSION['success'] ?? '';

// Clear messages after displaying them
unset($_SESSION['error']);
unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHASHANK OS - Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }
        .error-message {
            background-color: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.3);
            color: #d32f2f;
        }
        .success-message {
            background-color: rgba(0, 255, 0, 0.1);
            border: 1px solid rgba(0, 255, 0, 0.3);
            color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="background-gradient"></div>
    
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <h1>SHASHANK OS</h1>
                <p>Sign in to continue</p>
            </div>
            
            <?php if (!empty($error_message)): ?>
                <div class="message error-message">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($success_message)): ?>
                <div class="message success-message">
                    <?php echo htmlspecialchars($success_message); ?>
                </div>
            <?php endif; ?>
            
            <div class="form-container">
                <!-- Login Form -->
                <form id="loginForm" action="auth.php" method="post" class="active-form">
                    <div class="form-group">
                        <label for="loginUsername">
                            <span class="material-icons">person</span>
                            Username
                        </label>
                        <input type="text" id="loginUsername" name="username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="loginPassword">
                            <span class="material-icons">lock</span>
                            Password
                        </label>
                        <input type="password" id="loginPassword" name="password" required>
                    </div>
                    
                    <div class="form-group remember-me">
                        <input type="checkbox" id="rememberMe" name="remember">
                        <label for="rememberMe">Remember me</label>
                    </div>
                    
                    <button type="submit" name="login" class="btn-primary">
                        <span class="material-icons">login</span>
                        Sign In
                    </button>
                    
                    <div class="form-footer">
                        <p>Don't have an account? <a href="#" id="showSignup">Sign up</a></p>
                    </div>
                </form>
                
                <!-- Signup Form -->
                <form id="signupForm" action="auth.php" method="post">
                    <div class="form-group">
                        <label for="signupUsername">
                            <span class="material-icons">person</span>
                            Username
                        </label>
                        <input type="text" id="signupUsername" name="username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="signupEmail">
                            <span class="material-icons">email</span>
                            Email
                        </label>
                        <input type="email" id="signupEmail" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="signupPassword">
                            <span class="material-icons">lock</span>
                            Password
                        </label>
                        <input type="password" id="signupPassword" name="password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirmPassword">
                            <span class="material-icons">lock</span>
                            Confirm Password
                        </label>
                        <input type="password" id="confirmPassword" name="confirm_password" required>
                    </div>
                    
                    <button type="submit" name="signup" class="btn-primary">
                        <span class="material-icons">person_add</span>
                        Create Account
                    </button>
                    
                    <div class="form-footer">
                        <p>Already have an account? <a href="#" id="showLogin">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="login.js"></script>
</body>
</html>