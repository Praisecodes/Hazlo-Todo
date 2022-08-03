<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");

    require_once "connection.php";

    $content_type = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "Not Set";
    $username = null;
    $dataArr = array();
    $i = 0;
    $falsee = 'false';

    if($content_type === "application/json"){
        $content = trim(file_get_contents("php://input"));

        $decoded = json_decode($content, true);

        $username = testInput($decoded["username"]);
        $sql = "SELECT * FROM activities WHERE username=? AND isComplete=? AND isArchived=? AND isStarred=? AND inTrash=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $username, $falsee, $falsee, $falsee, $falsee);
        if($stmt->execute()){
            $result = $stmt->get_result();
            switch($result->num_rows){
                case 0:
                    echo json_encode([
                        "N/A"
                    ]);
                    $stmt->close();
                    $conn->close();
                    http_response_code(200);
                    exit;
                    break;
                
                case 1:
                    while($row = $result->fetch_assoc()){
                        $dataArr["ActivityTitle"] = $row["ActivityTitle"];
                        $dataArr["ActivityCategory"] = $row["ActivityCategory"];
                        $dataArr["ActivityStartTitme"] = $row["ActivityStartTitme"];
                        $dataArr["ActivityDueTime"] = $row["ActivityDueTime"];
                        $dataArr["ActivityImage"] = $row["ActivityImage"];
                        $dataArr["ActivityNote"] = $row["ActivityNote"];
                        $dataArr["isArchived"] = $row["isArchived"];
                        $dataArr["isStarred"] = $row["isStarred"];
                        $dataArr["inTrash"] = $row["inTrash"];
                        $dataArr["isComplete"] = $row["isComplete"];
                        $dataArr["isDue"] = $row["isDue"];
                    }
                    echo json_encode($dataArr);
                    http_response_code(200);
                    $stmt->close();
                    $conn->close();
                    exit;
                    break;

                default:
                    while($rows = $result->fetch_assoc()){
                        $dataArr[$i]["ActivityTitle"] = $rows["ActivityTitle"];
                        $dataArr[$i]["ActivityCategory"] = $rows["ActivityCategory"];
                        $dataArr[$i]["ActivityStartTitme"] = $rows["ActivityStartTitme"];
                        $dataArr[$i]["ActivityDueTime"] = $rows["ActivityDueTime"];
                        $dataArr[$i]["ActivityImage"] = $rows["ActivityImage"];
                        $dataArr[$i]["ActivityNote"] = $rows["ActivityNote"];
                        $dataArr[$i]["isArchived"] = $rows["isArchived"];
                        $dataArr[$i]["isStarred"] = $rows["isStarred"];
                        $dataArr[$i]["inTrash"] = $rows["inTrash"];
                        $dataArr[$i]["isComplete"] = $rows["isComplete"];
                        $dataArr[$i]["isDue"] = $rows["isDue"];

                        $i++;
                    }
                    echo json_encode($dataArr);
                    http_response_code(200);
                    $stmt->close();
                    $conn->close();
                    exit;
                    break;
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