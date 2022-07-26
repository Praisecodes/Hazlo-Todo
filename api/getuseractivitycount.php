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
        $isArchived_sql = "SELECT COUNT(ActivityTitle) FROM activities WHERE username=? AND isArchived='true';";
        $isDue_sql = "SELECT COUNT(ActivityTitle) FROM activities WHERE username=? AND isDue='true';";
        $isComplete_sql = "SELECT COUNT(ActivityTitle) FROM activities WHERE username=? AND isComplete='true';";
        $isStarred_sql = "SELECT COUNT(ActivityTitle) FROM activities WHERE username=? AND isStarred='true';";
        $isNotComplete_sql = "SELECT COUNT(ActivityTitle) FROM activities WHERE username=? AND isComplete='false';";
        $isTrashed_sql = "SELECT COUNT(ActivityTitle) FROM activities WHERE username=? AND inTrash='true'";
        $all_stmt = $conn->prepare($all_sql);
        $all_stmt->bind_param('s', $username);
        if($all_stmt->execute()){
            $all_result = $all_stmt->get_result();
            if($all_result->num_rows > 0){
                while($all_row = $all_result->fetch_assoc()){
                    $data["TotalActivities"] = $all_row["COUNT(ActivityTitle)"];
                }
                $all_stmt->close();
                $isArchived_stmt = $conn->prepare($isArchived_sql);
                $isArchived_stmt->bind_param('s', $username);
                if($isArchived_stmt->execute()){
                    $isArchived_result = $isArchived_stmt->get_result();
                    if($isArchived_result->num_rows > 0){
                        while($isArchived_row = $isArchived_result->fetch_assoc()){
                            $data["ArchivedActivities"] = $isArchived_row["COUNT(ActivityTitle)"];
                        }
                        $isArchived_stmt->close();
                        $isDue_stmt = $conn->prepare($isDue_sql);
                        $isDue_stmt->bind_param('s', $username);
                        if($isDue_stmt->execute()){
                            $isDue_result = $isDue_stmt->get_result();
                            while($isDue_row = $isDue_result->fetch_assoc()){
                                $data["ActivitiesDue"] = $isDue_row["COUNT(ActivityTitle)"];
                            }
                            $isDue_stmt->close();
                            $complete_stmt = $conn->prepare($isComplete_sql);
                            $complete_stmt->bind_param('s', $username);
                            if($complete_stmt->execute()){
                                $complete_result = $complete_stmt->get_result();
                                if($complete_result->num_rows > 0){
                                    while($complete_row = $complete_result->fetch_assoc()){
                                        $data["ActivitiesCompleted"] = $complete_row["COUNT(ActivityTitle)"];
                                    }
                                    $complete_stmt->close();
                                    $starred_stmt = $conn->prepare($isStarred_sql);
                                    $starred_stmt->bind_param('s', $username);
                                    if($starred_stmt->execute()){
                                        $starred_result = $starred_stmt->get_result();
                                        if($starred_result->num_rows > 0){
                                            while($starred_row = $starred_result->fetch_assoc()){
                                                $data["ActivitiesStarred"] = $starred_row["COUNT(ActivityTitle)"];
                                            }
                                            $starred_stmt->close();
                                            $unfinished_stmt = $conn->prepare($isNotComplete_sql);
                                            $unfinished_stmt->bind_param('s', $username);
                                            if($unfinished_stmt->execute()){
                                                $unfinished_result = $unfinished_stmt->get_result();
                                                if($unfinished_result->num_rows > 0){
                                                    while($unfinished_row = $unfinished_result->fetch_assoc()){
                                                        $data["ActivitiesUnfinished"] = $unfinished_row["COUNT(ActivityTitle)"];
                                                    }
                                                    $unfinished_stmt->close();
                                                    http_response_code(200);
                                                    $trash_stmt = $conn->prepare($isTrashed_sql);
                                                    $trash_stmt->bind_param('s', $username);
                                                    if($trash_stmt->execute()){
                                                        $trash_result = $trash_stmt->get_result();
                                                        if($trash_result->num_rows > 0){
                                                            while($trash_row = $trash_result->fetch_assoc()){
                                                                $data["ActivitiesTrashed"] = $trash_row["COUNT(ActivityTitle)"];
                                                            }
                                                            $trash_stmt->close();
                                                            $conn->close();
                                                            http_response_code(200);
                                                            echo json_encode($data);
                                                            exit;
                                                        }
                                                        else{
                                                            echo json_encode([
                                                                "No Data Returned(Trash)"
                                                            ]);
                                                            $trash_stmt->close();
                                                            $conn->close();
                                                            http_response_code(200);
                                                            exit;
                                                        }
                                                    }
                                                    else{
                                                        echo json_encode([
                                                            "1x02trashExecErr"
                                                        ]);
                                                        http_response_code(500);
                                                        $trash_stmt->close();
                                                        $conn->close();
                                                        exit;
                                                    }
                                                }
                                                else{
                                                    echo json_encode([
                                                        "No Data Returned(unfinished)"
                                                    ]);
                                                    $unfinished_stmt->close();
                                                    $conn->close();
                                                    http_response_code(500);
                                                    exit;
                                                }
                                            }
                                            else{
                                                echo json_encode([
                                                    "1x02unfiExecErr"
                                                ]);
                                                $unfinished_stmt->close();
                                                $conn->close();
                                                http_response_code(500);
                                                exit;
                                            }
                                        }
                                        else{
                                            echo json_encode([
                                                "No Data Returned(star)"
                                            ]);
                                            $starred_stmt->close();
                                            $conn->close();
                                            exit;
                                        }
                                    }
                                    else{
                                        echo json_encode([
                                            "1x02starExecErr"
                                        ]);
                                        $starred_stmt->close();
                                        $conn->close();
                                        http_response_code(500);
                                        exit;
                                    }
                                }
                                else{
                                    echo json_encode([
                                        "No Data Returned(comp)"
                                    ]);
                                    http_response_code(200);
                                    $complete_stmt->close();
                                    $conn->close();
                                    exit;
                                }
                            }
                            else{
                                echo json_encode([
                                    "1x02compExecErr"
                                ]);
                                $complete_stmt->close();
                                $conn->close();
                                http_response_code(500);
                                exit;
                            }
                        }
                        else{
                            echo json_encode([
                                "1x02DueExecErr"
                            ]);
                            $isDue_stmt->close();
                            $conn->close();
                            http_response_code(500);
                            exit;
                        }
                    }
                    else{
                        echo json_encode([
                            "No Data Returned(arc)"
                        ]);
                        $isArchived_stmt->close();
                        $conn->close();
                        exit;
                    }
                }
                else{
                    echo json_encode([
                        "1x02ArcExecErr"
                    ]);
                    $isArchived_stmt->close();
                    $conn->close();
                    http_response_code(500);
                    exit;
                }
            }
            else{
                echo json_encode([
                    "No Data Returned(All)"
                ]);
                http_response_code(200);
                $all_stmt->close();
                $conn->close();
                exit;
            }
        }
        else{
            echo json_encode([
                "1x01AllExecErr"
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
