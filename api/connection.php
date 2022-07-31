<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $conn = new mysqli("localhost", "root", "", "hazlotododb");

    // $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $cleardb_server = $cleardb_url["host"];
    // $cleardb_username = $cleardb_url["user"];
    // $cleardb_password = $cleardb_url["pass"];
    // $cleardb_db = substr($cleardb_url["path"],1);

    // $conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    if($conn->connect_error){
        echo json_encode([
            "Error 0x02: Error Connecting To Database"
        ]);
    }
    
?>