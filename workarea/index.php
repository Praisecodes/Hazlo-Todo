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
    <?php
        if(isset($_SESSION['message_success'])){
            echo "<div class='success_msg'>
            <p>" . $_SESSION['message_success'] . "</p>
            </div>";
            $_SESSION['message_success'] = null;
        }
    ?>

    <div class="top">
        <h1 class="logo">
            HAZLO TODO
        </h1>
        <div class="profileTop">
            <img src="" alt="">
            <div class="dropdown">
                <i class="fa fa-angle-down"></i>
            </div>
            <div class="profileMenu">
                <ul>
                    <li class="viewProfile">View Profile <i class="fa fa-id-badge"></i></li>
                    <li class="settings">Settings <i class="fa fa-gear"></i></li>
                    <li class="logout">Log Out <i class="fa fa-arrow-right-from-bracket"></i></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mainBodyContainer">
        <div class="sideBar">
            <div class="profileDiv">
                <div class="userImg">

                </div><br/>
                <p>Hello, <?php echo $_SESSION["userFname"];?></p>
                <a href="./signout.php">@<?php echo $_SESSION["username"];?></a>
            </div>
        </div>
        <div class="activityList">
            <h1>Under Contruction!!</h1>
        </div>
    </div>

    <script src="../scripts/workarea.js"></script>
</body>
</html>