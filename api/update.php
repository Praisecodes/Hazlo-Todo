<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");

    require_once "connection.php";

    $content_type = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "Not Set";
    $username = null; $activityTitle = null;

    if($content_type === "application/json"){
        $contents = trim(file_get_contents("php://input"));

        $decoded = json_decode($contents, true);

        $username = testInput($data);
        $activityTitle = testInput($data);

        switch($status){
            case "updatedue":
                $due_sql = "UPDATE activities SET isDue=? WHERE username=? AND ActivityTitle=?";

                $due_stmt = $conn->prepare($due_sql);
                $due_stmt->bind_param('sss', 'true', $username, $activityTitle);
                if($due_stmt->execute()){
                    echo json_encode([
                        "Success"
                    ]);
                    http_response_code(200);
                    $due_stmt->close();
                    $conn->close();
                    exit;
                }
                else{
                    echo json_encode([
                        "1x02execerr"
                    ]);
                    http_response_code(500);
                    $due_stmt->close();
                    $conn->close();
                    exit;
                }
                break;

            case "updatetrash":
                $trash_sql = "UPDATE activities SET inTrash=? WHERE username=? AND ActivityTitle=?";

                $trash_stmt = $conn->prepare($trash_sql);
                $trash_stmt->bind_param('sss', 'true', $username, $activityTitle);
                if($trash_stmt->execute()){
                    echo json_encode([
                        "Success"
                    ]);
                    http_response_code(200);
                    $trash_stmt->close();
                    $conn->close();
                    exit;
                }
                else{
                    echo json_encode([
                        "1x02execerr"
                    ]);
                    http_response_code(500);
                    $trash_stmt->close();
                    $conn->close();
                    exit;
                }
                break;

            case "updatearchive":
                $archive_sql = "UPDATE activities SET isArchived=? WHERE username=? AND ActivityTitle=?";

                $archive_stmt = $conn->prepare($archive_sql);
                $archive_stmt->bind_param('sss', 'true', $username, $activityTitle);
                if($archive_stmt->execute()){
                    echo json_encode([
                        "Success"
                    ]);
                    http_response_code(200);
                    $archive_stmt->close();
                    $conn->close();
                    exit;
                }
                else{
                    echo json_encode([
                        "1x02execerr"
                    ]);
                    http_response_code(500);
                    $archive_stmt->close();
                    $conn->close();
                    exit;
                }
                break;

            case "updatestarred":
                $star_sql = "UPDATE activities SET isStarred=? WHERE username=? AND ActivityTitle=?";

                $star_stmt = $conn->prepare($star_sql);
                $star_stmt->bind_param('sss', 'true', $username, $activityTitle);
                if($star_stmt->execute()){
                    echo json_encode([
                        "Success"
                    ]);
                    http_response_code(200);
                    $star_stmt->close();
                    $conn->close();
                    exit;
                }
                else{
                    echo json_encode([
                        "1x02execerr"
                    ]);
                    http_response_code(500);
                    $star_stmt->close();
                    $conn->close();
                    exit;
                }
                break;

            case "updatecompletestatus":
                $complete_sql = "UPDATE activities SET isComplete=? WHERE username=? AND ActivityTitle=?";

                $complete_stmt = $conn->prepare($complete_sql);
                $complete_stmt->bind_param('sss', 'true', $username, $activityTitle);
                if($complete_stmt->execute()){
                    echo json_encode([
                        "Success"
                    ]);
                    http_response_code(200);
                    $complete_stmt->close();
                    $conn->close();
                    exit;
                }
                else{
                    echo json_encode([
                        "1x02execerr"
                    ]);
                    http_response_code(500);
                    $complete_stmt->close();
                    $conn->close();
                    exit;
                }
                break;
    
            default:
                echo json_encode([
                    "1x01SNS"
                ]);
                http_response_code(200);
                break;
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