<?php

    // --- Connection Variables --- \\
    $host = "localhost"; // If online, place server name here.
    $username = "root"; // Default Username
    $password = "";   // Default Password
    $db = "mybook_db"; // Database Name

    // --- Create Connection to Database --- \\
    $connection = mysqli_connect($host, $username, $password, $db);

    $first_name = "Aidan";
    $last_name = "Monner";
    $query = "insert into users (first_name, last_name) values ('$first_name', '$last_name')";
    // mysqli_query($connection, $query);