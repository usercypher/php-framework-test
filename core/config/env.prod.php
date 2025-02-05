<?php

/**
* Application Configuration File
*
* This file contains key configuration settings for the application,
* including environment, routing, and database configurations.
*/

return array(
    // Environment Settings
    'DIR_RELATIVE' => 'public/', // Ensures static resources are always relative to index.php

    'SHOW_ERRORS' => 0, // Enable or disable detailed error messages (1: Show, 0: Hide)

    'ROUTE_MAIN_FILE' => 'index.php',

    // Routing Configuration
    'ROUTE_REWRITE' => 0, // Enable or disable URL rewriting (1: Yes, 0: No).
    // If enabled, routing is handled via clean URLs (e.g., /home),
    // and the ROUTE_PARAM is not needed.

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

    // Database Configuration
    'DB_HOST' => '127.0.0.1', // Database host, usually 'localhost' or an IP address.
    'DB_PORT' => '3306', // Port of the database to connect to.
    'DB_NAME' => 'library', // Name of the database to connect to.
    'DB_USER' => 'root', // Username for database authentication.
    'DB_PASS' => '', // Password for the database user. Leave empty for no password.
);