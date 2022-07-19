<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");

    $content_type = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER["CONTENT_TYPE"]) : "Not Set";

    if($content_type === "application/json"){
        $contents = trim(file_get_contents("php://input"));

        $decoded = json_decode($contents, true);

        echo json_encode($decoded);
    }
    else{
        echo json_encode([
            $content_type
        ]);
        http_response_code(403);
        exit;
    }
?>