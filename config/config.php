<?php

try {
    // Database host
    $HOST = "localhost";

    // Database name
    $DBNAME = "tokyo";

    // Database user
    $USER = "root";

    // Database password
    $PASS = "";

    // Create a new PDO instance
    $conn = new PDO("mysql:host=" . $HOST . ";dbname=" . $DBNAME, $USER, $PASS);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    ///Uncomment the following lines for debugging the connection status
    // if ($conn) {
    //     echo "Successful";
    // }
} catch (PDOException $e) {
    // Output the error message
    echo "Connection failed: " . $e->getMessage();
    if ($con == false) {
        echo "Failed";
    }
}
