<?php
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["userFname"])){
        $_SESSION['message'] = "Please Make sure You Login";
        header("Location: ../");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Hazlo Todo | Work Area</title>
</head>
<body>
    

    <script src="../scripts/workarea.js"></script>
</body>
</html>