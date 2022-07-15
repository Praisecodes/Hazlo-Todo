<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: Content-Type");

    require_once "connection.php";

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "Not Set";

    $username = null; $password = null; $main_password = null;
    if($contentType === "application/json"){
        $contents = trim(file_get_contents("php://input"));

        $decoded = json_decode($contents, true);
        $username = testInput($decoded["Username"]);
        $password = testInput($decoded["Password"]);

        $sql = "SELECT user_password FROM user_info WHERE username=?;";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        if(!($stmt->execute())){
            echo json_encode([
                "Error 0x03: Error Executing Statement"
            ]);
            http_response_code(200);
            $stmt->close();
            $conn->close();
            exit;
        }
        else{
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                echo json_encode([
                    "0x1DBE"
                ]);
                http_response_code(200);
                $stmt->close();
                $conn->close();
                exit;
            }
            else{
                while($row = $result->fetch_assoc()){
                    $main_password = $row["user_password"];
                }
                if(!($password === $main_password)){
                    echo json_encode([
                        "0x1MIS"
                    ]);
                    http_response_code(200);
                    $stmt->close();
                    $conn->close();
                    exit;
                }
                else{
                    echo json_encode([
                        "Success"
                    ]);
                    setcookie("__hz_username", $username, time() + (86400 * 3), "/");
                    http_response_code(200);
                    $stmt->close();
                    $conn->close();
                    exit;
                }
            }
        }
    }
    else{
        http_response_code(500);
        echo json_encode([
            "Error 0x01: Invalid Type Recieved"
        ]);
        exit;
    }

    function testInput($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>