<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: Content-Type");

    require_once "connection.php";
    require_once "testInput.php";

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "Not Set";

    $fullname = null; $email = null; $username = null; $password = null; $confirm_password = null;

    if($contentType === "application/json"){
        $contents = trim(file_get_contents("php://input"));

        $decoded = json_decode($contents, true);
        
        if($decoded["Confirm_password"] === $decoded["Password"]){
            $password = TestInput($decoded["Confirm_password"]);
            $fullname = TestInput($decoded["Fullname"]);
            $username = TestInput($decoded["Username"]);
            $email = TestInput($decoded["Email"]);

            $check_sql = "SELECT * FROM user_info WHERE username=?";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bind_param('s', $username);
            if(!($check_stmt->execute())){
                echo json_encode([
                    "Error 1x01: Fatal Execution Error"
                ]);
                $check_stmt->close();
                $conn->close();
                http_response_code(500);
                exit;
            }
            else{
                $result = $check_stmt->get_result();
                if($result->num_rows > 0){
                    echo json_encode([
                        "0x1EX"
                    ]);
                    $check_stmt->close();
                    $conn->close();
                    http_response_code(200);
                    exit;
                }
                else{
                    $Sql = "INSERT INTO user_info(fullname, username, user_password, email) VALUES (?,?,?,?);";
                    $stmt = $conn->prepare($Sql);
                    $stmt->bind_param('ssss', $fullname, $username, $password, $email);
                    if(!($stmt->execute())){
                        echo json_encode([
                            "Error 1x02: Fatal Execution Error"
                        ]);
                        $stmt->close();
                        $conn->close();
                        http_response_code(500);
                        exit;
                    }
                    else{
                        echo json_encode([
                            "Success"
                        ]);
                        http_response_code(200);
                        $stmt->close();
                        $conn->close();
                        exit;
                    }
                }
            }
        }
        else{
            echo json_encode([
                "0x1MIS"
            ]);
            exit;
        }
        
    }
?>