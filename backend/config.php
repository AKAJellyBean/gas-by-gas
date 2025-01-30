<?php

    // supabase database connection
    $host = "aws-0-us-west-1.pooler.supabase.com";
    $dbname = "postgres";
    $user = "postgres.eacvnnkjzvvzdjinlzkg";
    $password = "0wSiaAihRes1J5Q7";

    try {
        $conn = new PDO("pgsql:host=$host;dbname=$dbname;", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connection pass";
    } catch (PDOException $e) {
        die("Database Connection failed {$e->getMessage()}");
    }
?>