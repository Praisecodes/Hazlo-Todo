<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css">
    <title>Hazlo Todo | Work Area</title>
</head>
<body>
    <div class="top">
        <h1 class="logo">
            HAZLO TODO
        </h1>
    </div>
    <div class="mainBodyContainer">
        <div class="sideBar">
            <div class="profileDiv">
                <div class="userImg">

                </div><br/>
                <h2>Hello, <?php echo $_SESSION["username"];?></h2>
                <a href="">@<?php echo $_SESSION["username"];?></a>
            </div>
        </div>
        <div class="activityList">
            <h1>Under Contruction!!</h1>
        </div>
    </div>
</body>
</html>