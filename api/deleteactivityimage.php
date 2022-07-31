<?php
    if(isset($_COOKIE["__hz_already-storedImage"])){
        if(unlink($_COOKIE["__hz_already-storedImage"])){
            echo 'success';
        }
        else{
            echo 'fail';
        }
    }
    else{
        //http_response_code(200);
        echo 'ddd';
    }
?>