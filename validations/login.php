<?php
    session_start();
    //header("Location: ../");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username  = test_input($_POST["usernameLogin"]);
        $email = test_input($_POST["emailLogin"]);
        $password = test_input($_POST["passwordLogin"]);

        if(empty($username) || empty($password) || empty($email)){
            header("Location: ../");
            echo $username . " and " . $password;
        }
        else{
            $_SESSION["username"] = $username;
            header("Location: ../workarea");
        }
    }


    function test_input($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>