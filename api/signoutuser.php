<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    setcookie("__hz_username", "", time() - 1000, "/");
    echo json_encode([
        "Ok"
    ]);
    http_response_code(200);
    exit;
?>