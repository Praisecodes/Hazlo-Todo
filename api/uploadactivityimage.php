
<?php
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
                echo $finalPath;
            }
            else{
                echo "Failed";
            }
        }
        else{
            echo "1x02Size";
        }
    }
    else{
        echo "1x01Err";
    }
?>