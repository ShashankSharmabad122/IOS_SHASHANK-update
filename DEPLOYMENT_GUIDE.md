# Shashank OS - Deployment Guide

This guide will help you deploy your Shashank OS application to a free hosting service.

## Step 1: Choose a Free Hosting Service

Recommended free hosting services for PHP/MySQL applications:

- **000webhost** (www.000webhost.com)
- **InfinityFree** (infinityfree.net)
- **AwardSpace** (www.awardspace.com)
- **Byethost** (byethost.com)

## Step 2: Sign Up and Get Hosting Credentials

1. Create an account on your chosen hosting service
2. Note down your:
   - Control panel login details
   - FTP credentials
   - MySQL database credentials

## Step 3: Set Up Your Database

1. Log in to your hosting control panel
2. Find the MySQL database section (often labeled "MySQL Databases" or "Database Manager")
3. Create a new database named `shashank_os` (or use the name provided by your host)
4. Create a database user and assign it to your database with all privileges
5. Note down the database name, username, and password

## Step 4: Upload Your Files

### Using FTP:
1. Download and install an FTP client like FileZilla
2. Connect to your hosting using the FTP credentials provided
3. Upload all files from your local project to the public_html or www folder on the server

### Using Web File Manager:
1. Log in to your hosting control panel
2. Find the File Manager tool
3. Navigate to the public_html or www folder
4. Upload all your project files

## Step 5: Update Database Connection Settings

Before accessing your site, you'll need to update the database connection settings in these files:
- `auth.php`
- `settings.php`
- `file_manager.php`
- `db_setup.php`

In each file, modify these lines with your hosting database credentials:
```php
// Database connection
$host = 'localhost'; // Usually stays as 'localhost'
$dbname = 'your_database_name'; // The database name you created
$username = 'your_database_username'; // The database username
$password = 'your_database_password'; // The database password
```

## Step 6: Set Up Database Tables

1. Navigate to your website URL and add `/db_setup.php` at the end
   (e.g., `http://yoursite.com/db_setup.php`)
2. This will run the database setup script and create all necessary tables
3. You should see a success message and a link to the login page

## Step 7: Test Your Application

1. Visit your website URL
2. Try to register a new account
3. Log in with the new account
4. Test all features to ensure they work correctly

## Troubleshooting Common Issues

### Database Connection Errors
- Double-check your database credentials in all PHP files
- Ensure your hosting supports PDO for MySQL
- Check if your database name is correct

### File Permission Issues
- Make sure all files have the correct permissions:
  - PHP files: 644
  - Directories: 755

### PHP Version Issues
- Most free hosts support PHP 7.x or 8.x
- If you encounter errors, check your hosting's PHP version and make sure it's compatible with your code

### Error Logs
- Check your hosting's error logs for specific error messages
- Most control panels have a section for viewing error logs

## Security Considerations

1. After deployment, consider implementing HTTPS if your hosting supports it
2. Regularly backup your database
3. Keep your PHP code updated with security best practices
4. Consider implementing rate limiting for login attempts

## Going Live Checklist

- [ ] Database created and credentials noted
- [ ] Files uploaded to hosting
- [ ] Database connection settings updated
- [ ] Database tables created via db_setup.php
- [ ] Test registration and login functionality
- [ ] Test all application features
- [ ] Check for any error messages or warnings