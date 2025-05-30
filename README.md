# Shashank OS

A modern web-based operating system interface that simulates a desktop environment in your browser, complete with multiple applications, file management, and a sleek user interface.

![Shashank OS](https://via.placeholder.com/800x400?text=Shashank+OS)

## Overview

Shashank OS provides a complete desktop-like experience in your web browser. It features multiple integrated applications, a file management system, and a customizable user interface. The system is built with security in mind, implementing modern authentication practices and data protection.

## Features

### Core System
- **Modern Desktop Interface** - Complete with taskbar, start menu, and window management
- **Multi-application Environment** - Run multiple apps simultaneously with window controls
- **Theme Customization** - Toggle between light and dark modes
- **Dynamic Wallpapers** - Support for both static and video wallpapers

### Applications
- **File Explorer** - Browse, manage, and organize your virtual files and folders
- **Web Browser** - Browse the internet within the OS environment
- **Settings** - Customize your OS experience
- **Studio Code** - Built-in code editor for development
- **Paint** - Simple drawing application
- **Terminal** - Command-line interface
- **Flappy Bird** - Built-in game for entertainment
- **Portfolio** - Integrated personal portfolio showcase

### User System
- **Secure Authentication** - Login/signup with password hashing
- **Remember Me** - Stay logged in across sessions
- **User Profiles** - Personalized user experience
- **User-specific Settings** - Customizable preferences saved per user

### Data Management
- **Virtual File System** - Database-backed file storage
- **User-specific Storage** - Isolated data for each user
- **Persistent Settings** - User preferences saved between sessions

## Setup Instructions

### Local Development

1. **Prerequisites**:
   - Web server with PHP support (XAMPP, WAMP, or MAMP)
   - MySQL/MariaDB database
   - PHP 7.4+ with PDO extension

2. **Installation**:
   - Clone or download the repository to your web server's document root
   - Configure your database connection in `config.php`
   - Create the database by visiting `db_setup.php` in your browser (e.g., http://localhost/finelcut/db_setup.php)
   - Navigate to the main application (e.g., http://localhost/finelcut/)
   - Create a new account or log in with the default credentials (if provided)

3. **Development Environment**:
   - Modify CSS in `style.css` for UI changes
   - Edit JavaScript functionality in `app.js`
   - Modify PHP backend files as needed

### Deployment

For deploying to a live server, please refer to the [Deployment Guide](DEPLOYMENT_GUIDE.md) and [Going Live Checklist](GOING_LIVE_CHECKLIST.md) included in this repository.

## Database Structure

The application uses a MySQL database with the following structure:

- **users**: User account information (id, username, password_hash, email, remember_token, created_at)
- **user_settings**: User preferences (id, user_id, setting_name, setting_value)
- **user_files**: Virtual file storage (id, user_id, filename, file_path, file_type, file_size, created_at, updated_at)
- **user_folders**: Folder structure (id, user_id, folder_name, parent_folder_id, created_at)

## Technologies Used

### Frontend
- HTML5 & CSS3 for structure and styling
- JavaScript (ES6+) for interactive functionality
- Fabric.js for canvas-based applications
- Material Icons for UI elements
- Custom animations and transitions

### Backend
- PHP for server-side processing
- MySQL for database storage
- PDO for secure database connections
- Session management for user state

### Security
- Password hashing using PHP's password_hash()
- Session-based authentication
- Remember me tokens with secure implementation
- Input validation and sanitization
- Prepared statements for database queries

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgments

- Material Icons for the UI elements
- Fabric.js for canvas functionality
- All contributors who have helped shape this project