<?php
    $servername = "localhost";
    $database = "fct";
    $username = "david";
    $password = "qwe123QWE123*";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    mysqli_set_charset($conn, "utf8");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>