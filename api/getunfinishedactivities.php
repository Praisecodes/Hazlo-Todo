<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: Content-Type");

    require_once "testInput.php";
    require_once "connection.php";

    $content_type = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "Not Set";
    $data = array();
    $i = 0;
    $username = null;
    $newVal = "false";

    if($content_type === "application/json"){
        $content = trim(file_get_contents("php://input"));

        $decoded = json_decode($content, true);

        $username = TestInput($decoded["username"]);
        $sql = "SELECT * FROM activities WHERE username=? AND isComplete=?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $newVal);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0 && $result->num_rows == 1){
                while($row = $result->fetch_assoc()){
                    $data["username"] = $row["username"];
                    $data["ActivityTitle"] = $row["ActivityTitle"];
                    $data["ActivityCategory"] = $row["ActivityCategory"];
                    $data["ActivityStartTime"] = $row["ActivityStartTime"];
                    $data["ActivityDueTime"] = $row["ActivityDueTime"];
                    $data["ActivityImage"] = $row["ActivityImage"];
                    $data["ActivityNote"] = $row["ActivityNote"];
                    $data["isArchived"] = $row["isArchived"];
                    $data["isStarred"] = $row["isStarred"];
                    $data["inTrash"] = $row["inTrash"];
                    $data["isComplete"] = $row["isComplete"];
                    $data["isDue"] = $row["isDue"];
                }
                echo json_encode($data);
            }
            elseif($result->num_rows > 1){
                while($row = $result->fetch_assoc()){
                    $data[$i]["username"] = $row["username"];
                    $data[$i]["ActivityTitle"] = $row["ActivityTitle"];
                    $data[$i]["ActivityCategory"] = $row["ActivityCategory"];
                    $data[$i]["ActivityStartTime"] = $row["ActivityStartTime"];
                    $data[$i]["ActivityDueTime"] = $row["ActivityDueTime"];
                    $data[$i]["ActivityImage"] = $row["ActivityImage"];
                    $data[$i]["ActivityNote"] = $row["ActivityNote"];
                    $data[$i]["isArchived"] = $row["isArchived"];
                    $data[$i]["isStarred"] = $row["isStarred"];
                    $data[$i]["inTrash"] = $row["inTrash"];
                    $data[$i]["isComplete"] = $row["isComplete"];
                    $data[$i]["isDue"] = $row["isDue"];

                    $i++;
                }
                echo json_encode($data);
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
?>