<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");
    require_once "connection.php";

    $content_type = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "Not Set";
    $username = null;
    $data = array();
    
    if($content_type === "application/json"){
        $content = trim(file_get_contents("php://input"));

        $decoded = json_decode($content, true);
        $username = InputTesting($decoded["username"]);

        $all_sql = "SELECT COUNT(ActivityTitle) FROM activities WHERE username=?;";
        $all_stmt = $conn->prepare($all_sql);
        $all_stmt->bind_param('s', $username);
        if($all_stmt->execute()){
            $all_result = $all_stmt->get_result();
            if($all_result->num_rows > 0){
                // while($all_row = $all_result->fetch_assoc()){
                //     $data["TotalActivities"] = $all_row;
                // }
                $data["TotalActivities"] = $all_result;
                echo json_encode($data);
                
            }
            else{
                echo json_encode([
                    "No Data Returned"
                ]);
                http_response_code(200);
            }
        }
        else{
            echo json_encode([
                "1x01ExecErr"
            ]);
            $all_stmt->close();
            $conn->close();
            http_response_code(500);
            exit;
        }
    }
    else{
        echo json_encode([
            $content_type
        ]);
        http_response_code(403);
        exit;
    }

    function InputTesting($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>
