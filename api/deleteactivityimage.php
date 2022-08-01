<?php
    session_start();
    if(isset($_SESSION["__hz_already-storedImage"])){
        if(unlink($_SESSION["__hz_already-storedImage"])){
            echo 'success';
        }
        else{
            echo $_SESSION['__hz_already-storedImage'];
        }
    }
    else{
        //http_response_code(200);
        echo 'success';
    }
?>