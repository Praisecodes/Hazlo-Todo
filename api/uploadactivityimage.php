<?php
    session_start();
    // $targetDir = "https://hazlotodo.herokuapp.com/activityimages/";
    $targetDir = "C:\\xampp\\htdocs\\hazlo\\activityimages\\";
    
    
    $fileName = $_FILES["activityImage"]["name"];
    $fileSize = $_FILES["activityImage"]["size"];
    $fileErrorCount = $_FILES["activityImage"]["error"];
    $fileTempLocation = $_FILES["activityImage"]["tmp_name"];
    $fileName_Ext = explode(".", $fileName);
    $fileExtension = strtolower(end($fileName_Ext));
    if($fileErrorCount == 0){
        if($fileSize < 2000000){
            $NewFileName = $_COOKIE['__hz_username'] . "_" . $_COOKIE["__hz_activity-title"] . "." . $fileExtension;
            $finalPath = $targetDir . $NewFileName;
            if(move_uploaded_file($fileTempLocation, $finalPath)){
                echo "Success";
                $_SESSION["__hz_already-storedImage"] = $finalPath;
                http_response_code(200);
                exit;
            }
            else{
                echo "Failed";
                http_response_code(500);
                exit;
            }
        }
        else{
            echo "1x02Size";
            http_response_code(403);
            exit;
        }
    }
    else{
        echo "1x01Err";
        http_response_code(500);
        exit;
    }
?>