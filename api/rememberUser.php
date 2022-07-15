<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    require_once "connection.php";

    if(isset($_COOKIE["__hz_username"])){
        echo json_encode([
            $_COOKIE["__hz_username"]
        ]);
        http_response_code(200);
        exit;
    }
    else{
        echo json_encode([
            "false"
        ]);
        http_response_code(200);
        exit;
    }
?>