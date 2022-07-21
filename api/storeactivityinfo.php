<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");

    require_once "connection.php";

    $content_type = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER["CONTENT_TYPE"]) : "Not Set";
    $username = null; $ActivityTitle = null; $ActivityCategory = null; $ActivityDueTime = null; $ActivityImage = null;
    $ActivityNote = null; $isArchived = "false"; $isStarred = "false"; $inTrash = "false"; $isComplete = "false";
    $isDue = "false";

    if($content_type === "application/json"){
        $contents = trim(file_get_contents("php://input"));

        $decoded = json_decode($contents, true);

        $username = InputTester($decoded["username"]);
        $ActivityTitle = InputTester($decoded["ActivityTitle"]);
        $ActivityCategory = InputTester($decoded["ActivityCategory"]);
        $ActivityDueTime = InputTester($decoded["ActivityDueTime"]);
        $ActivityImage = InputTester($decoded["ActivityImage"]);
        $ActivityNote = InputTester($decoded["ActivityNote"]);

        $sql = "SELECT * FROM activities WHERE username=? AND ActivityTitle=?;";
        $insertSql = "INSERT INTO activities(username, ActivityTitle, ActivityCategory, ActivityDueTime, ActivityImage, ActivityNote, isArchived, isStarred, inTrash, isComplete, isDue) VALUES(?,?,?,?,?,?,?,?,?,?,?);";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $ActivityTitle);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                echo json_encode([
                    "Exists"
                ]);
                $stmt->close();
                $conn->close();
                http_response_code(200);
                exit;
            }
            else{
                $insertStmt = $conn->prepare($insertSql);
                $insertStmt->bind_param('sssssssssss', $username, $ActivityTitle, $ActivityCategory, $ActivityDueTime,
                $ActivityImage, $ActivityNote, $isArchived, $isStarred, $inTrash, $isComplete, $isDue);
                if($insertStmt->execute()){
                    echo json_encode([
                        "Success"
                    ]);
                    $insertStmt->close();
                    $conn->close();
                    http_response_code(200);
                    exit;
                }
                else{
                    echo json_encode([
                        "1x02ExecErr"
                    ]);
                    $insertStmt->close();
                    $conn->close();
                    http_response_code(500);
                    exit;
                }
            }
        }
        else{
            echo json_encode([
                "1x01ExecErr"
            ]);
            http_response_code(500);
            $stmt->close();
            $conn->close();
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

    function InputTester($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>