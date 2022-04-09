<?php
    session_start();

    $MainPassword = null;
    $FullName = null;
    $username = null;
    $MainUsername = null;
    $_SESSION["userFname"] = null;
    $_SESSION["username"] = null;

    $email_pattern = "/[a-zA-Z0-9\.\-_]+[@][a-z]{2,}[\.][a-z]{2,}/i";
    $username_pattern = "/^[a-zA-Z0-9\-_]+$/i";
    $password_pattern = "/(?=.*[_\.\-@])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9_\-\.@]{8,}/i";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username  = test_input($_POST["usernameLogin"]);
        $email = test_input($_POST["emailLogin"]);
        $password = test_input($_POST["passwordLogin"]);

        if(empty($username) || empty($password) || empty($email)){
            header("Location: ../");
            $_SESSION['message'] = "Please Fill In All Spaces";
        }
        else{
            //Get Heroku ClearDB connection information
            $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $cleardb_server = $cleardb_url["host"];
            $cleardb_username = $cleardb_url["user"];
            $cleardb_password = $cleardb_url["pass"];
            $cleardb_db = substr($cleardb_url["path"],1);

            //$conn = new mysqli("localhost", "root", "", "users");
            $conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

            if($conn->connect_error){
                die ("Error here: " . $conn->connect_error);
            }

            $sqlQuery = "SELECT UserPassword, FullName, UserName, UserEmail FROM user_info WHERE UserEmail = ?";

            if($stmt = $conn->prepare($sqlQuery)){
                $stmt->bind_param("s", $Email);

                $Email = $email;
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $MainPassword = $row['UserPassword'];
                        $FullName = $row['FullName'];
                        $MainUsername = $row['UserName'];
                        $email = $row['UserEmail'];
                    }
                    if(!($password === $MainPassword)){
                        $_SESSION['message'] = "Invalid Password";
                        header("Location: ../");
                    }
                    elseif(!($username === $MainUsername)){
                        $_SESSION['message'] = "Username Mismatch";
                        header("Location: ../");
                    }
                    else{
                        setcookie("usersname", $MainUsername, time()+86400,"/");
                        setcookie("fullname", $FullName, time()+86400, "/");
                        if(isset($_COOKIE["usersname"]) && isset($_COOKIE["fullname"])){
                            $_SESSION["username"] = $_COOKIE["usersname"];
                            $_SESSION["userFname"] = $_COOKIE["fullname"];
                            $_SESSION['message_success'] = $_COOKIE["usersname"] . " and " . $_COOKIE["fullname"];
                            header("Location: ../workarea");
                        }
                    }
                }
                else{
                    $_SESSION['message'] = "No Such User, Please Sign Up";
                    header("Location: ../");
                }

                
            }
            else{
                $_SESSION['message'] = "An Error Occured, Please Contact Us Immediately";
                header("Location: ../");
            }

            $stmt->close();
            $conn->close();
            header("Location: ../");
        }
    }


    function test_input($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>