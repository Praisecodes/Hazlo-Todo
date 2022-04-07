<?php
    session_start();
    $_SESSION['message'] = null;
    $_SESSION['message_success'] = null;

    $email_pattern = "/[a-zA-Z0-9\.\-_]+[@][a-z]{2,}[\.][a-z]{2,}/i";
    $username_pattern = "/^[a-zA-Z0-9\-_]+$/i";
    $name_pattern = "/^[a-zA-Z]+$/i";
    $othernames_pattern = "/^[a-zA-Z]+$/i";
    $password_pattern = "/(?=.*[_\.\-@])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9_\-\.@]{8,}/i";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstname = test_input($_POST["Firstname"]);
        $lastname = test_input($_POST["LastName"]);
        $OtherNames = test_input($_POST["OtherNames"]);
        $username = test_input($_POST["userNameSignup"]);
        $password = test_input($_POST["passwordSignup"]);
        $confirmPassword = test_input($_POST["confirmPassword"]);
        $email = test_input($_POST["emailSignup"]);
        $gender = strtolower(test_input($_POST["gender"]));
        
        if($firstname == "" || $lastname == "" || $OtherNames == "" || $username == "" || $password == "" || 
        $confirmPassword == "" || $email == "" || $gender == ""){
            $_SESSION['message'] = "Some Fields Were Left Empty<br/>Please Fill Out All Fields";
            header("Location: ../");
        }
        elseif(!preg_match($name_pattern, $firstname) || !preg_match($name_pattern, $lastname) || !preg_match($othernames_pattern, $OtherNames)
         || !preg_match($username_pattern, $username) ||!preg_match($email_pattern, $email) || !preg_match($password_pattern, $password) || $confirmPassword != $password){
             $_SESSION['message'] = "Some Fields Have Wrong Input, Please Follow Instructions Carefully!";
             header("Location: ../");
        }
        elseif(!$gender === "male" || !$gender === "female"){
            $_SESSION['message'] = "Please Type In Male Or Female";
            header("Location: ../");
        }
        else{
            $fullname = $lastname . " " . $firstname . " " . $OtherNames;

            //Get Heroku ClearDB connection information
            $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $cleardb_server = $cleardb_url["host"];
            $cleardb_username = $cleardb_url["user"];
            $cleardb_password = $cleardb_url["pass"];
            $cleardb_db = substr($cleardb_url["path"],1);

            $active_group = 'default';
            $query_builder = TRUE;

            $conn = new mysqli("localhost", "root", "", "users");
            //$conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


            if($conn->connect_error){
                die ("Not connecting ". $conn->connect_error);
            }

            $sqlQuery = 'INSERT INTO user_info (FullName, UserName, UserEmail, UserPassword, UserGender)
            VALUES (?, ?, ?, ?, ?);';

            if($stmt = $conn->prepare($sqlQuery)){
                $stmt->bind_param("sssss", $FullNmae, $UserName, $Email, $Password, $Gender);

                $FullNmae = $fullname;
                $UserName = $username;
                $Email = $email;
                $Password = $password;
                $Gender = $gender;
                $stmt->execute();
                header("Location: ../");
                $_SESSION['message_success'] = "SUCESS!! Please Login";
            }
            else{
                echo "An Issue Occured!!";
            }

            $stmt->close();
            $conn->close();
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>