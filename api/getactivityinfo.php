<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");

    require_once "connection.php";

    $content_type = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "Not Set";
    $data = array();
    $username = null; $activityTitle = null;

    if($content_type === "application/json"){
        $contents = trim(file_get_contents("php://input"));

        $decoded = json_decode($contents, true);
        $username = testInput($decoded["username"]);
        $activityTitle = testInput($decoded["activityTitle"]);

        $sql = "SELECT * FROM activities WHERE username=? AND ActivityTitle=?;";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $activityTitle);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data["username"] = $row["username"];
                    $data["ActivityTitle"] = $row["ActivityTitle"];
                    $data["ActivityCategory"] = $row["ActivityCategory"];
                    $data["ActivityStartTitme"] = $row["ActivityStartTitme"];
                    $data["ActivityDueTime"] = $row["ActivityDueTime"];
                    $data["ActivityImage"] = $row["ActivityImage"];
                    $data["ActivityNote"] = $row["ActivityNote"];
                    $data["isArchived"] = $row["isArchived"];
                    $data["isStarred"] = $row["isStarred"];
                    $data["inTrash"] = $row["inTrash"];
                    $data["isComplete"] = $row["isComplete"];
                }

                echo json_encode($data);
                http_response_code(200);
                $stmt->close();
                $conn->close();
                exit;
            }
            else{
                echo json_encode([
                    "1x02N/A"
                ]);
                http_response_code(200);
                $stmt->close();
                $conn->close();
                exit;
            }
        }
        else{
            echo json_encode([
                "1x01ExecErr"
            ]);
            $stmt->close();
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

    function testInput($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>