<?php
// Include authentication check
include 'check_auth.php';

// Get username for personalization
$username = $_SESSION['username'] ?? 'User';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHASHANK OS</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <script defer src="app.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/brevis" rel="stylesheet">
    
    <!-- Script to handle direct access to Studio Code -->
    <script>
        // Check if URL has a hash parameter for direct app access
        window.addEventListener('DOMContentLoaded', function() {
            if (window.location.hash === '#studio-code') {
                window.location.href = 'studio-code.html';
            }
        });
    </script>
</head>

<body>
    <div class="background-gradient"></div>
    
    <!-- Video Background -->
    <div class="video-background">
        <video autoplay muted loop id="bgVideo">
            <source src="0001-0250.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>

    <main>
        <div id="desktop">
            <div class="app-grid">
                <div class="app-icon" onclick="openApp('fileExplorer')">
                    <div class="icon-3d">
                        <span class="material-icon">folder</span>
                    </div>
                    <span class="app-name">Files</span>
                </div>

                <div class="app-icon" onclick="openApp('webBrowser')">
                    <div class="icon-3d">
                        <span class="material-icon">language</span>
                    </div>
                    <span class="app-name">Browser</span>
                </div>

                <div class="app-icon" onclick="openApp('settings')">
                    <div class="icon-3d">
                        <span class="material-icon">settings</span>
                    </div>
                    <span class="app-name">Settings</span>
                </div>

                <div class="app-icon" onclick="openApp('flappyBird')">
                    <div class="icon-3d flappy-bird-icon">
                        <div class="flappy-bird-face"></div>
                    </div>
                    <span class="app-name">Flappy Bird</span>
                </div>

                <div class="app-icon" onclick="openApp('paint')">
                    <div class="icon-3d">
                        <span class="material-icon">brush</span>
                    </div>
                    <span class="app-name">Paint</span>
                </div>

                <div class="app-icon" onclick="openApp('terminal')">
                    <div class="icon-3d">
                        <span class="material-icon">code</span>
                    </div>
                    <span class="app-name">Terminal</span>
                </div>

                <div class="app-icon" onclick="window.location.href='studio-code-redirect.html'">
                    <div class="icon-3d">
                        <span class="material-icon">code_off</span>
                    </div>
                    <span class="app-name">Studio-Code</span>
                </div>

                <div class="app-icon" onclick="window.location.href='portfolio-redirect.html'">
                    <div class="icon-3d">
                        <span class="material-icon">person</span>
                    </div>
                    <span class="app-name">Portfolio</span>
                </div>
            </div>

            <div class="widgets-container">
                <div class="widget calendar">
                    <h3>Calendar</h3>
                    <p id="currentDate"></p>
                </div>
                <div class="widget notes">
                    <h3>Notes</h3>
                    <textarea id="notesArea" placeholder="Write your notes here..."></textarea>
                </div>
            </div>
        </div>
    </main>

    <!-- Main Menu Button Container -->
    <div id="mainMenuContainer">
        <div id="mainMenuButton" onclick="toggleMainMenu()" title="Open Main Menu">
            <div class="custom-logo">
                <div class="logo-circle"></div>
                <div class="logo-rays">
                    <div class="ray ray1"></div>
                    <div class="ray ray2"></div>
                    <div class="ray ray3"></div>
                    <div class="ray ray4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Taskbar (hidden by default) -->
    <div id="taskbar" class="taskbar">
        <div class="taskbar-left">
            <div id="taskbarStartButton" onclick="toggleStartMenu()" title="Open Main Menu">
                <div class="custom-logo">
                    <div class="logo-circle"></div>
                    <div class="logo-rays">
                        <div class="ray ray1"></div>
                        <div class="ray ray2"></div>
                        <div class="ray ray3"></div>
                        <div class="ray ray4"></div>
                    </div>
                </div>
            </div>
            <div class="os-name">SHASHANK OS</div>
            <div class="taskbar-search">
                <div class="search-icon">
                    <span class="material-icon">search</span>
                </div>
                <input type="text" id="taskbarSearch" placeholder="Search apps and files..." onkeyup="performTaskbarSearch(event)">
            </div>
            <div class="taskbar-apps">
                <div class="taskbar-app" onclick="openApp('fileExplorer')" title="Files">
                    <span class="material-icon">folder</span>
                </div>
                <div class="taskbar-app" onclick="openApp('webBrowser')" title="Browser">
                    <span class="material-icon">language</span>
                </div>
                <div class="taskbar-app" onclick="openApp('settings')" title="Settings">
                    <span class="material-icon">settings</span>
                </div>
                <div class="taskbar-app" onclick="openApp('flappyBird')" title="Flappy Bird">
                    <div class="mini-flappy-bird"></div>
                </div>
                <div class="taskbar-app" onclick="openApp('paint')" title="Paint">
                    <span class="material-icon">brush</span>
                </div>
                <div class="taskbar-app" onclick="openApp('terminal')" title="Terminal">
                    <span class="material-icon">code</span>
                </div>
                <div class="taskbar-app" onclick="window.location.href='studio-code-redirect.html'" title="ShashankOS Studio Code">
                    <span class="material-icon">code_off</span>
                </div>
                <div class="taskbar-app" onclick="window.location.href='portfolio-redirect.html'" title="Shashank's Portfolio">
                    <span class="material-icon">person</span>
                </div>
            </div>
        </div>
        <div class="taskbar-right">
            <div class="taskbar-notifications" onclick="toggleNotificationCenter()" title="Notifications">
                <span class="material-icon">notifications</span>
            </div>
            <div class="taskbar-time" id="taskbarTime"></div>
            <div class="user-profile" onclick="toggleProfilePopup()">
                <span class="material-icon">account_circle</span>
                <span><?php echo htmlspecialchars($username); ?></span>
                <div class="user-dropdown" onclick="event.stopPropagation()">
                    <a href="#" onclick="toggleProfilePopup(); return false;">View Profile</a>
                    <a href="#" onclick="toggleTheme(); return false;">Change Theme</a>
                    <a href="auth.php?logout=1">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Search Results Panel -->
    <div id="searchResultsPanel" class="search-results-panel">
        <div class="search-results-header">
            <h3>Search Results</h3>
            <div class="search-close" onclick="closeSearchResults()">
                <span class="material-icon">close</span>
            </div>
        </div>
        <div id="searchResultsList" class="search-results-list">
            <!-- Search results will be populated here -->
        </div>
    </div>
    
    <!-- Floating Action Button removed and placed in dedicated container -->
    
    <!-- Floating system info -->
    <div id="floatingSystemInfo">
        <span id="currentTime"></span>
    </div>
    
    <!-- Notification Center will be added dynamically by JavaScript -->

    <!-- Windows for apps -->
    <div id="fileExplorerWindow" class="window" style="display: none;">
        <div class="window-header">
            <span>Files</span>
            <div class="window-controls">
                <button class="minimize" onclick="minimizeWindow('fileExplorerWindow')">—</button>
                <button class="maximize" onclick="maximizeWindow('fileExplorerWindow')">□</button>
                <button class="close" onclick="closeWindow('fileExplorerWindow')">×</button>
            </div>
        </div>
        <div class="window-content">
            <div class="sidebar">
                <ul id="systemFolders">
                    <li>Desktop</li>
                    <li>Documents</li>
                    <li>Downloads</li>
                    <li>Pictures</li>
                    <li>Music</li>
                    <li>Videos</li>
                </ul>
            </div>
            <div id="fileOperations">
                <!-- Placeholder for file operations -->
            </div>
        </div>
    </div>

    <div id="webBrowserWindow" class="window" style="display: none;">
        <div class="window-header">
            <span>Browser</span>
            <div class="window-controls">
                <button class="minimize" onclick="minimizeWindow('webBrowserWindow')">—</button>
                <button class="maximize" onclick="maximizeWindow('webBrowserWindow')">□</button>
                <button class="close" onclick="closeWindow('webBrowserWindow')">×</button>
            </div>
        </div>
        <div class="window-content">
            <div class="browser-toolbar">
                <button class="nav-button" onclick="navigateBack()" title="Back">←</button>
                <button class="nav-button" onclick="navigateForward()" title="Forward">→</button>
                <button class="nav-button" onclick="refreshPage()" title="Refresh">↻</button>
                <button class="nav-button" onclick="goToHomePage()" title="Home">
                    <span class="material-icon">home</span>
                </button>
                <div class="search-bar-container">
                    <div class="search-icon">
                        <span class="material-icon">search</span>
                    </div>
                    <input type="text" id="addressBar" placeholder="Search Google or enter URL..."
                           onkeydown="if(event.key === 'Enter') loadPage()"
                           onfocus="toggleSearchSuggestions()">
                    <div id="searchSuggestions" class="search-suggestions"></div>
                </div>
                <button class="nav-button" onclick="loadPage()" title="Go">
                    <span class="material-icon">arrow_forward</span>
                </button>
            </div>
            <div class="browser-status-bar">
                <div class="browser-status-text">Ready</div>
                <div class="browser-security">
                    <span class="material-icon">lock</span>
                    <span>Secure</span>
                </div>
            </div>
            <div id="browserContent" class="browser-content"></div>
        </div>
    </div>

    <div id="settingsWindow" class="window" style="display: none;">
        <div class="window-header">
            <span>Settings</span>
            <div class="window-controls">
                <button class="minimize" onclick="minimizeWindow('settingsWindow')">—</button>
                <button class="maximize" onclick="maximizeWindow('settingsWindow')">□</button>
                <button class="close" onclick="closeWindow('settingsWindow')">×</button>
            </div>
        </div>
        <div class="window-content">
            <div class="settings-grid">
                <div class="settings-card" onclick="toggleTheme()">
                    <span class="material-icon">dark_mode</span>
                    <span>Toggle Theme</span>
                </div>
                <div class="settings-card" onclick="toggleAdaptiveWallpaper()">
                    <span class="material-icon">auto_awesome</span>
                    <span>Adaptive Wallpaper</span>
                </div>
                <div class="settings-card" onclick="toggleVideoWallpaper()">
                    <span class="material-icon">videocam</span>
                    <span>Video Wallpaper</span>
                </div>
            </div>

            <div class="settings-section">
                <h3><span class="material-icon">wallpaper</span> Wallpaper Gallery</h3>
                <div id="wallpaperGallery" class="wallpaper-gallery"></div>
            </div>

            <div id="systemInfo">
                <p>OS Name: Shashank IOS</p>
                <p>Version: 1.0</p>
                <p>RAM Usage: 50%</p>
            </div>
        </div>
    </div>

    <div id="flappyBirdWindow" class="window" style="display: none;">
        <div class="window-header flappy-header">
            <div class="flappy-title">
                <div class="mini-flappy-bird"></div>
                <span>Flappy Bird</span>
            </div>
            <div class="window-controls">
                <button class="minimize" onclick="minimizeWindow('flappyBirdWindow')">—</button>
                <button class="maximize" onclick="maximizeWindow('flappyBirdWindow')">□</button>
                <button class="close" onclick="closeWindow('flappyBirdWindow')">×</button>
            </div>
        </div>
        <div class="window-content">
            <canvas id="flappyBirdCanvas" width="320" height="480"></canvas>
        </div>
    </div>

    <div id="paintWindow" class="window" style="display: none;">
        <div class="window-header">
            <span>Paint</span>
            <div class="window-controls">
                <button class="minimize" onclick="minimizeWindow('paintWindow')">—</button>
                <button class="maximize" onclick="maximizeWindow('paintWindow')">□</button>
                <button class="close" onclick="closeWindow('paintWindow')">×</button>
            </div>
        </div>
        <div class="window-content">
            <div class="paint-toolbar">
                <div class="tool-group">
                    <button id="pencilTool" class="tool-button active" title="Pencil">
                        <span class="material-icon">create</span>
                    </button>
                    <button id="brushTool" class="tool-button" title="Brush">
                        <span class="material-icon">brush</span>
                    </button>
                    <button id="eraserTool" class="tool-button" title="Eraser">
                        <span class="material-icon">auto_fix_normal</span>
                    </button>
                </div>
                <div class="tool-group">
                    <input type="color" id="colorPicker" value="#000000">
                    <div class="brush-size">
                        <span>Size:</span>
                        <input type="range" id="brushSize" min="1" max="50" value="5">
                    </div>
                </div>
                <div class="tool-group">
                    <button id="clearCanvas" class="tool-button" title="Clear Canvas">
                        <span class="material-icon">delete</span>
                    </button>
                    <button id="saveCanvas" class="tool-button" title="Save Image">
                        <span class="material-icon">save</span>
                    </button>
                </div>
            </div>
            <div class="canvas-container">
                <canvas id="paintCanvas"></canvas>
            </div>
        </div>
    </div>

    <div id="terminalWindow" class="window" style="display: none;">
        <div class="window-header">
            <span>Terminal</span>
            <div class="window-controls">
                <button class="minimize" onclick="minimizeWindow('terminalWindow')">—</button>
                <button class="maximize" onclick="maximizeWindow('terminalWindow')">□</button>
                <button class="close" onclick="closeWindow('terminalWindow')">×</button>
            </div>
        </div>
        <div class="window-content">
            <div id="terminal" class="terminal">
                <div class="terminal-output">
                    <p>Welcome to ShashankOS Terminal v1.0</p>
                    <p>Type 'help' to see available commands</p>
                </div>
                <div class="terminal-input-line">
                    <span class="terminal-prompt">user@shashankos:~$</span>
                    <input type="text" id="terminalInput" autocomplete="off">
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu (Start Menu) -->
    <div id="startMenu" class="start-menu">
        <div class="start-menu-header">
            <div class="user-info">
                <div class="user-avatar">
                    <span class="material-icon">account_circle</span>
                </div>
                <div class="user-name"><?php echo htmlspecialchars($username); ?></div>
            </div>
            <div class="power-options">
                <div class="power-option" onclick="window.location.href='auth.php?logout=1'" title="Sign Out">
                    <span class="material-icon">logout</span>
                </div>
                <div class="power-option" onclick="toggleStartMenu()" title="Close Menu">
                    <span class="material-icon">close</span>
                </div>
            </div>
        </div>
        <div class="start-menu-search">
            <div class="search-icon">
                <span class="material-icon">search</span>
            </div>
            <input type="text" id="startMenuSearch" placeholder="Type here to search..." onkeyup="filterStartMenuApps(this.value)">
        </div>
        <div class="start-menu-apps">
            <div class="app-category">
                <h3>Apps</h3>
                <div class="app-list" id="appList">
                    <div class="start-menu-app" onclick="openApp('fileExplorer'); toggleStartMenu();">
                        <span class="material-icon">folder</span>
                        <span>Files</span>
                    </div>
                    <div class="start-menu-app" onclick="openApp('webBrowser'); toggleStartMenu();">
                        <span class="material-icon">language</span>
                        <span>Browser</span>
                    </div>
                    <div class="start-menu-app" onclick="openApp('settings'); toggleStartMenu();">
                        <span class="material-icon">settings</span>
                        <span>Settings</span>
                    </div>
                    <div class="start-menu-app" onclick="openApp('flappyBird'); toggleStartMenu();">
                        <div class="mini-flappy-bird"></div>
                        <span>Flappy Bird</span>
                    </div>
                    <div class="start-menu-app" onclick="openApp('paint'); toggleStartMenu();">
                        <span class="material-icon">brush</span>
                        <span>Paint</span>
                    </div>
                    <div class="start-menu-app" onclick="openApp('terminal'); toggleStartMenu();">
                        <span class="material-icon">code</span>
                        <span>Terminal</span>
                    </div>
                    <div class="start-menu-app" onclick="window.location.href='studio-code-redirect.html'">
                        <span class="material-icon">code_off</span>
                        <span>Studio-Code</span>
                    </div>
                    <div class="start-menu-app" onclick="window.location.href='portfolio-redirect.html'">
                        <span class="material-icon">person</span>
                        <span>Portfolio</span>
                    </div>
                </div>
            </div>
            <div class="app-category">
                <h3>Quick Links</h3>
                <div class="quick-links">
                    <div class="quick-link" onclick="toggleStartMenu(); openApp('settings');">
                        <span class="material-icon">account_circle</span>
                        <span>Account</span>
                    </div>
                    <div class="quick-link" onclick="toggleStartMenu(); openApp('settings');">
                        <span class="material-icon">dark_mode</span>
                        <span>Theme</span>
                    </div>
                    <div class="quick-link" onclick="toggleStartMenu(); openApp('settings');">
                        <span class="material-icon">help</span>
                        <span>Help</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification Center -->
    <div id="notificationCenter" class="notification-center">
        <div class="notification-header">
            <h3>Notifications</h3>
            <div class="notification-controls">
                <button onclick="clearAllNotifications()">Clear All</button>
                <button onclick="toggleNotificationCenter()">
                    <span class="material-icon">close</span>
                </button>
            </div>
        </div>
        <div id="notificationList" class="notification-list">
            <!-- Notifications will be added here dynamically -->
            <div class="notification">
                <div class="notification-icon">
                    <span class="material-icon">info</span>
                </div>
                <div class="notification-content">
                    <div class="notification-title">Welcome to ShashankOS</div>
                    <div class="notification-message">Click on any app icon to get started.</div>
                    <div class="notification-time">Just now</div>
                </div>
                <div class="notification-close" onclick="removeNotification(this.parentNode)">
                    <span class="material-icon">close</span>
                </div>
            </div>
        </div>
        <div class="quick-settings">
            <div class="quick-setting" onclick="toggleTheme()">
                <span class="material-icon">dark_mode</span>
                <span>Theme</span>
            </div>
            <div class="quick-setting" onclick="toggleVideoWallpaper()">
                <span class="material-icon">videocam</span>
                <span>Video BG</span>
            </div>
            <div class="quick-setting" onclick="openApp('settings')">
                <span class="material-icon">settings</span>
                <span>Settings</span>
            </div>
        </div>
    </div>

    <!-- User Profile Popup -->
    <div id="userProfilePopup" class="user-profile-popup">
        <div class="profile-header">
            <div class="profile-avatar">
                <span class="material-icon">account_circle</span>
            </div>
            <div class="profile-name"><?php echo htmlspecialchars($username); ?></div>
        </div>
        <div class="profile-actions">
            <a href="#" onclick="openApp('settings'); toggleProfilePopup(); return false;">
                <span class="material-icon">settings</span>
                <span>Settings</span>
            </a>
            <a href="#" onclick="toggleTheme(); return false;">
                <span class="material-icon">dark_mode</span>
                <span>Toggle Theme</span>
            </a>
            <a href="auth.php?logout=1">
                <span class="material-icon">logout</span>
                <span>Sign Out</span>
            </a>
        </div>
    </div>

    <!-- Accessibility Panel -->
    <div id="accessibilityPanel" class="accessibility-panel">
        <div class="accessibility-header">
            <h3>Accessibility</h3>
            <button class="close-button" onclick="toggleAccessibilityPanel()">
                <span class="material-icon">close</span>
            </button>
        </div>
        <div class="accessibility-content">
            <div class="accessibility-section">
                <h4>Vision</h4>
                <div class="accessibility-options">
                    <div class="preference-item">
                        <div class="preference-label">Text Size</div>
                        <div class="preference-control">
                            <div class="range-slider">
                                <input type="range" min="80" max="120" value="100" id="fontSizeSlider">
                                <div class="range-value"><span id="fontSizeValue">100%</span></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="preference-item">
                        <div class="preference-label">High Contrast</div>
                        <div class="preference-control">
                            <label class="toggle-switch">
                                <input type="checkbox" id="highContrastToggle">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="preference-item">
                        <div class="preference-label">Reduce Motion</div>
                        <div class="preference-control">
                            <label class="toggle-switch">
                                <input type="checkbox" id="reduceMotionToggle">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>