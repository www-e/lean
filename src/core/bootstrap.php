<?php

// (c) 2024 Your Academy Name
// Application Bootstrap
session_start(); // START SESSIONS

// 1. Load Composer's autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

// 2. Use the Eloquent Capsule manager
use Illuminate\Database\Capsule\Manager as Capsule;

// 3. Create a new Capsule instance
$capsule = new Capsule;

// 4. Configure the database connection
$capsule->addConnection([
    'driver'    => 'mysql',
    // --- UPDATE WITH YOUR LOCAL XAMPP DETAILS ---
    'host'      => 'localhost',
    'database'  => 'leanplatform_db', // The name you chose in phpMyAdmin
    'username'  => 'root',            // XAMPP default username
    'password'  => '',                // XAMPP default password is empty
    // ----------------------------------------------------
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_general_ci',
    'prefix'    => '',
]);

// 5. Make this Capsule instance available globally via static methods
$capsule->setAsGlobal();

// 6. Boot Eloquent
$capsule->bootEloquent();

// Now, we can use Eloquent models anywhere in our app!