<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");

    require_once "connection.php";

    $data = array();

    $content_type = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "Not Set";

    if($content_type === "application/json"){
        $contents = trim(file_get_contents("php://input"));

        $decoded = json_decode($contents, true);

        $sql = "SELECT * FROM user_info WHERE username = ?";
        $stmt = $conn->prepare($sql);
        if($stmt->bind_param('s', $decoded["username"])){
            if($stmt->execute()){
                $result = $stmt->get_result();

                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        $data["fullname"] = $row["fullname"];
                        $data["username"] = $row["username"];
                        $data["email"] = $row["email"];
                    }

                    echo json_encode($data);
                    http_response_code(200);
                    $conn->close();
                    $stmt->close();
                    exit;
                }
                else{
                    echo json_encode([
                        "1x04_N/A"
                    ]);
                    http_response_code(200);
                    $conn->close();
                    $stmt->close();
                    exit;
                }
            }
            else{
                http_response_code(400);
                echo json_encode([
                    "1x03_exec"
                ]);
                $conn->close();
                $stmt->close();
                exit;
            }
        }
        else{
            http_response_code(400);
            echo json_encode([
                "1x02_BIND"
            ]);
            $conn->close();
            $stmt->close();
            exit;
        }

    }
    else{
        echo json_encode([
            "1x01_IC_T"
        ]);
        exit;
    }
?>