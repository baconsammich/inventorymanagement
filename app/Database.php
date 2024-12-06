<?php

class Database {
    private static $connection = null;

    /**
     * Establish a database connection using PDO.
     *
     * @return PDO The database connection.
     * @throws Exception If the connection fails.
     */
    public static function connect() {
        if (self::$connection === null) {
            // Fetch configuration
            $config = include __DIR__ . '/../config/database.php';

            try {
                // Attempt to establish a connection
                self::$connection = new PDO(
                    "mysql:unix_socket={$config['unix_socket']};dbname={$config['dbname']};charset={$config['charset']}",
                    $config['user'],
                    $config['password']
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Log and display the error
                error_log("Database connection error: " . $e->getMessage());
                throw new Exception("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$connection;
    }

    /**
     * Close the database connection.
     */
    public static function disconnect() {
        self::$connection = null;
    }
}

