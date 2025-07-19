<?php

// (c) 2024 Your Academy Name
// Application Bootstrap

// 1. Load Composer's autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

// 2. Use the Eloquent Capsule manager
use Illuminate\Database\Capsule\Manager as Capsule;

// 3. Create a new Capsule instance
$capsule = new Capsule;

// 4. Configure the database connection
$capsule->addConnection([
    'driver'    => 'mysql',
    // --- UPDATE WITH YOUR HOSTINGER DATABASE DETAILS ---
    'host'      => 'localhost',
    'database'  => 'your_database_name',
    'username'  => 'your_database_username',
    'password'  => 'your_database_password',
    // ----------------------------------------------------
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// 5. Make this Capsule instance available globally via static methods
$capsule->setAsGlobal();

// 6. Boot Eloquent
$capsule->bootEloquent();

// Now, we can use Eloquent models anywhere in our app!