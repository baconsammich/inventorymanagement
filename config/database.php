<?php
return [
    // Unix socket path for MySQL connection
    'unix_socket' => '/var/run/mysqld/mysqld.sock', // Ensure this matches your MySQL socket path

    // Database name
    'dbname' => 'ElectronicPartsInventory',        // Your database name

    // MySQL user credentials
    'user' => 'epiuser',                           // MySQL username
    'password' => 'saltypassword123!',             // MySQL password

    // Character set for database interaction
    'charset' => 'utf8mb4',                        // Recommended charset
];

