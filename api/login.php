<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $ContentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "Content Type Is Not application/json";

    $data = array();
    if($ContentType === "application/json"){
        $contents = trim(file_get_contents("php://input"));

        $decoded = json_decode($contents, true);

        if(is_array($decoded)){
            $conn = new mysqli("localhost", "root", "", "users");
            
            $i = 0;

            if($conn->connect_error){
                echo json_encode([
                    "message" => "Error: " . $conn->connect_error
                ]);
            }
            else{
                $sql = "SELECT * FROM user_info WHERE UserEmail = ?;";

                $stmt = $conn->prepare($sql);
                if($stmt->bind_param("s", $decoded["email"])){
                    if(!$stmt->execute()){
                        echo json_encode([
                            "message" => "Error With The Execution"
                        ], true);
                    }
                    else{
                        if(!$result = $stmt->get_result()){
                            echo json_encode([
                                "message" => "Serious Error"
                            ], true);
                        }
                        else{
                            if($result->num_rows > 0){
                                
                                while($row = $result->fetch_assoc()){
                                    $data["Username"] = $row["UserName"];
                                    $data["Password"] = $row["UserPassword"];
                                    $data["Email"] = $row["UserEmail"];

                                    $i++;
                                }
                                if($decoded["password"] === $data["Password"] && $decoded["username"] === $data["Username"]){
                                    echo json_encode([
                                        "message" => "Success"
                                    ], true);
                                }
                                elseif(!($decoded["password"] === $data["Password"])){
                                    echo json_encode([
                                        "message" => "Invalid Password"
                                    ], true);
                                }
                                elseif(!($decoded["username"] === $data["Username"])){
                                    echo json_encode([
                                        "message" => "Invalid Username"
                                    ], true);
                                }
                                else{
                                    echo json_encode([
                                        "message" => "Invalid Credentials"
                                    ]);
                                }
                            }
                            else{
                                echo json_encode([
                                    "message" => "No such user found"
                                ], true);
                            }
                        }
                    }
                }
                else{
                    echo json_encode([
                        "message" => "A Fatal Error Has Occured, Please Contact The Developer Immediately"
                    ], true);
                }
            }
        }
        else{
            echo json_encode([
                "message" => "Not Returning An Array"
            ], true);
        }
    }
    else{
        echo json_encode([
            "message" => "Error: " . $ContentType
        ], true);
    }
?>