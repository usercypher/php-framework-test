<?php

return array(
    'env' => array(
        'dev' => array(
            // Environment Settings
            'DIR_WEB' => 'web/',  // Directory for web access (e.g., public folder)
            'DIR_SRC' => 'src/',  // Source directory for application code
            'DIR_VIEW'=> 'view/', // View Directory
            'URL_DIR_WEB' => 'web/', // URL path for web access
            'URL_DIR_INDEX' => '',      // URL path for the index (usually root), become useless when route rewrite is enable
            // Error Settings
            // The view name format is '{error code}.php'. Default is '500.php'.
            // Custom error numbers can be used with 'trigger_error(404|Not found)'.
            'DIR_VIEW_ERROR' => 'view/error/', // Directory for error views
            'SHOW_ERRORS' => 1, // Enable (1) or disable (0) detailed error messages
            // Routing Configuration
            'ROUTE_REWRITE' => 0, // Enable or disable URL rewriting (1: Yes, 0: No).
            // If enabled, routing is handled via clean URLs (e.g., /home),
            /*
             * Web Server Configuration for URL Rewriting:
             *
             * Apache (.htaccess):
             *     RewriteEngine On
             *     RewriteBase /
             *     RewriteCond %{REQUEST_FILENAME} !-f
             *     RewriteCond %{REQUEST_FILENAME} !-d
             *     RewriteRule ^(.*)$ index.php [QSA,L]
             *
             * Nginx:
             *     location / {
             *         try_files $uri $uri/ /index.php?$query_string;
             *     }
             */
            // Logging Configuration
            'DIR_LOG' => 'var/log/',
            'DIR_LOG_TIMESTAMP' => 'var/data/',
            'LOG_SIZE_LIMIT_MB' => 5,
            'LOG_CLEANUP_INTERVAL_DAYS' => 1,
            'LOG_RETENTION_DAYS' => 7,
            'MAX_LOG_FILES' => 10,
            // Database Configuration
            'DB_HOST' => '127.0.0.1',
            'DB_PORT' => '3306',
            'DB_NAME' => 'library',
            'DB_USER' => 'root',
            'DB_PASS' => '',
            'DB_TIME' => '+08:00',
            /*  
             * Timezones
             *
             * -05:00 = Eastern Standard Time (EST)
             * +08:00 = Philippine Standard Time (PST)
             * +09:00 = Japan Standard Time (JST)
             */
        ),
        'prod' => array(
            // Environment Settings
            'DIR_WEB' => 'web/', 
            'DIR_SRC' => 'src/',
            'DIR_VIEW'=> 'view/',
            'URL_DIR_WEB' => 'web/',
            'URL_DIR_INDEX' => '', 
            // Error Settings
            'DIR_VIEW_ERROR' => 'view/error/',
            'SHOW_ERRORS' => 0, 
            // Routing Configuration
            'ROUTE_REWRITE' => 0,
            // Logging Configuration
            'DIR_LOG' => 'var/log/',
            'DIR_LOG_TIMESTAMP' => 'var/data/',
            'LOG_SIZE_LIMIT_MB' => 5,
            'LOG_CLEANUP_INTERVAL_DAYS' => 1,
            'LOG_RETENTION_DAYS' => 7,
            'MAX_LOG_FILES' => 10,
            // Database Configuration
            'DB_HOST' => '127.0.0.1',
            'DB_PORT' => '3306',
            'DB_NAME' => 'library',
            'DB_USER' => 'root',
            'DB_PASS' => '',
            'DB_TIME' => '+08:00',
        )
    ),
    'ini' => array(
        'dev' => array(
            // Timezone
            'date.timezone' => 'Asia/Manila', // Set to your timezone
            // Error Reporting
            'display_errors' => 'On', // Display errors (dev only)
            'display_startup_errors' => 'On', // Display startup errors
            'error_reporting' => E_ALL, // Report all errors
            'log_errors' => 1, // Log errors
            'error_log' => 'error_log', // Log file path
            // General Settings
            'default_charset' => 'UTF-8', // Charset UTF-8
            // Performance Settings
            'memory_limit' => '128M', // Increase memory limit for dev
            'max_execution_time' => 7200, // Max execution time for dev
         ),
         'prod' => array(
             // Timezone
            'date.timezone' => 'Asia/Manila',
            // Error Reporting
            'display_errors' => 'Off',
            'display_startup_errors' => 'Off',
            'error_reporting' => E_ALL & ~E_NOTICE & ~E_DEPRECATED,
            'log_errors' => 1,
            'error_log' => 'error_log',
            // General Settings
            'default_charset' => 'UTF-8',
            // Performance Settings
            'memory_limit' => '256M',
            'max_execution_time' => 30,
         )
    )
);