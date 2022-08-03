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
                        $dataArr["ActivityTitle"] = reverseCharacters($row["ActivityTitle"]);
                        $dataArr["ActivityCategory"] =reverseCharacters( $row["ActivityCategory"]);
                        $dataArr["ActivityStartTime"] = reverseCharacters($row["ActivityStartTime"]);
                        $dataArr["ActivityDueTime"] = reverseCharacters($row["ActivityDueTime"]);
                        $dataArr["ActivityImage"] = reverseCharacters($row["ActivityImage"]);
                        $dataArr["ActivityNote"] = reverseCharacters($row["ActivityNote"]);
                        $dataArr["isArchived"] = reverseCharacters($row["isArchived"]);
                        $dataArr["isStarred"] = reverseCharacters($row["isStarred"]);
                        $dataArr["inTrash"] = reverseCharacters($row["inTrash"]);
                        $dataArr["isComplete"] = reverseCharacters($row["isComplete"]);
                        $dataArr["isDue"] = reverseCharacters($row["isDue"]);
                    }
                    echo json_encode($dataArr);
                    http_response_code(200);
                    $stmt->close();
                    $conn->close();
                    exit;
                    break;

                default:
                    while($rows = $result->fetch_assoc()){
                        $dataArr[$i]["ActivityTitle"] = reverseCharacters($rows["ActivityTitle"]);
                        $dataArr[$i]["ActivityCategory"] = reverseCharacters($rows["ActivityCategory"]);
                        $dataArr[$i]["ActivityStartTime"] = reverseCharacters($rows["ActivityStartTime"]);
                        $dataArr[$i]["ActivityDueTime"] = reverseCharacters($rows["ActivityDueTime"]);
                        $dataArr[$i]["ActivityImage"] = reverseCharacters($rows["ActivityImage"]);
                        $dataArr[$i]["ActivityNote"] = reverseCharacters($rows["ActivityNote"]);
                        $dataArr[$i]["isArchived"] = reverseCharacters($rows["isArchived"]);
                        $dataArr[$i]["isStarred"] = reverseCharacters($rows["isStarred"]);
                        $dataArr[$i]["inTrash"] = reverseCharacters($rows["inTrash"]);
                        $dataArr[$i]["isComplete"] = reverseCharacters($rows["isComplete"]);
                        $dataArr[$i]["isDue"] = reverseCharacters($rows["isDue"]);

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

    function reverseCharacters($input){
        $input = htmlspecialchars_decode($input);
        return $input;
    }
?>