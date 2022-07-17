<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    require_once "connection.php";

    $data = array();
    $i = 0;

    $sql = "SELECT * FROM user_info;";

    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $data[$i]["fullname"] = $row["fullname"];
                $data[$i]["username"] = $row["username"];
                $data[$i]["email"] = $row["email"];

                $i++;
            }

            echo json_encode($data);
            $stmt->close();
            $conn->close();
            http_response_code(200);
            exit;
        }
        else{
            echo json_encode([
                "No data returned"
            ]);
            $stmt->close();
            $conn->close();
            http_response_code(200);
            exit;
        }
    }
    else{
        echo json_encode([
            "Error 1"
        ]);
    }
?>