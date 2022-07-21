<?php
    $targetDir = "../profile/picture/";
    $fileName = $_FILES["chosenImage"]["name"];
    $FileSize = $_FILES["chosenImage"]["size"];
    $FileTempLocation = $_FILES["chosenImage"]["tmp_name"];
    $FileError = $_FILES["chosenImage"]["error"];
    $FileName_Ext = explode(".", $fileName);
    $FileExtension = strtolower(end($FileName_Ext));
    
    if($FileError == 0){
        if($FileSize < 2000000){
            $NewName = $_COOKIE["username"] . "_profileimage" . $FileExtension; 
            $FinalLocation = $targetDir . $NewName;
            if(move_uploaded_file($FileTempLocation, $FinalLocation)){
                echo $FinalLocation;
                http_response_code(200);
                exit;
            }
            else{
                echo "Error";
                http_response_code(500);
                exit;
            }
        }
        else{
            echo "1x02size";
            http_response_code(400);
            exit;
        }
    }
    else{
        echo "1x01Err";
        http_response_code(400);
        exit;
    }
?>