<?php
// index.php

function init($mode, $dir) {
    // Get the absolute path of the directory
    $dir = realpath($dir) . '/';

    // Include core class for application functionality
    require($dir . 'uc.package.php');

    // Load settings for the given mode (e.g., 'dev', 'prod')
    $settings = require($dir . 'uc.settings.php');

    // Set application INI and environment variables based on mode
    App::setInis($settings['ini'][$mode]);
    App::setEnvs($settings['env'][$mode]);

    // Initialize and return the App with Request and Response objects
    return new App(array(
        'Request' => new Request, 
        'Response' => new Response
    ));
}

$app = init('prod', __DIR__);

// [CONFIG] start

// Auto-load classes from 'src/' directory and set path metadata (max depth 1)
$app->autoSetClass('src/', array('max' => 1));

// Set up the 'Database' class with caching enabled, ensuring a single instance is used.
$app->setClass('Database', array('cache' => true));

// Define and inject dependencies: 'BookModel' depends on 'Database', 'BookController' depends on 'BookModel', 'Request', and 'Response'.
$app->setClasses(array(
    'args' => array('Database')
), array(
    array('BookModel')
));

$app->setClasses(array(
    'args' => array('Request', 'Response')
), array(
    array('BookController', array('args' => array('BookModel'))) // Class-specific options merged with group options
));


// Define middlewares to handle session, CSRF generation, and data sanitization
$app->setMiddlewares(array(
    'SessionMiddleware', 
    'CsrfGenerateMiddleware', 
    'SanitizeMiddleware'
));

// Define routes
$app->setRoute('GET', '', 'index', array('controller' => 'BookController')); // Default route

// Define additional routes for 'home' and 'create' actions in 'BookController'
$app->setRoutes(array(), array(
    array('GET', 'home', 'index', array('controller' => 'BookController')),
    array('GET', 'create', 'create', array('controller' => 'BookController'))
));

// Define a route for editing a book, with an ID parameter (only digits allowed)
$app->setRoutes(array('controller' => 'BookController'), array(
    array('GET', 'edit/{id:^\d+$}', 'edit')
));

// Define routes for 'book/' prefix with CSRF validation middleware
$app->setRoutes(array(
    'prefix' => 'book/',
    'controller' => 'BookController',
    'middleware' => array('CsrfValidateMiddleware'),
    'ignore' => array('CsrfGenerateMiddleware')
), array(
    array('POST', 'create', 'store'),
    array('POST', 'update', 'update'),
    array('POST', 'delete', 'delete')
));
// [CONFIG] end

// Uncomment to save the configuration once, then load it on subsequent runs.
// The configuration is saved using 'saveConfig' and loaded with 'loadConfig'.
// After the initial run, you can comment out 'saveConfig' and just use 'loadConfig'.
// When using 'loadConfig', remove or comment out the [CONFIG] body to avoid redundant config setting.
//$app->saveConfig('var/data/app.config'); // Save the configuration once
//$app->loadConfig('var/data/app.config'); // Load the saved configuration on subsequent runs

// Load base classes (Controller, Model), it included files base on class name
$app->loadClasses(array('Controller', 'Model'));

// Run the application
$app->run();