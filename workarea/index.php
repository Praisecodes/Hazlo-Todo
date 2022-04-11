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

    <div class="sideNav">
        
    </div>
    
    <div class="top">
        <div class="left">
            <i class="fa fa-ellipsis"></i>
            <h1 class="logo">
                HAZLO TODO
            </h1>
        </div>
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
                <a href="">@<?php echo $_SESSION["username"];?></a>
            </div><br/>

            <div class="options">
                <ul>
                    <li class="allActivities">
                        All Activities <i class="fa fa-angle-left"></i>

                        <div class="activity hidden">
                            <button class="addActivity">
                                Add An Activity <i class="fa fa-plus"></i>
                            </button>
                            <button class="addActivity">
                                Add An Activity <i class="fa fa-plus"></i>
                            </button>
                            <button class="addActivity">
                                Add An Activity <i class="fa fa-plus"></i>
                            </button>
                            <button class="addActivity">
                                Add An Activity <i class="fa fa-plus"></i>
                            </button>
                            <button class="addActivity">
                                Add An Activity <i class="fa fa-plus"></i>
                            </button>
                            <button class="addActivity">
                                Add An Activity <i class="fa fa-plus"></i>
                            </button>
                            <button class="addActivity">
                                Add An Activity <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </li>
                    <li class="settings">User Settings <i class="fa fa-gear"></i></li>
                    <li class="profile">User Profile <i class="fa fa-id-badge"></i></li>
                </ul>
            </div>
        </div>
        <div class="activityList">
            <h1>Under Construction!!</h1>
        </div>
    </div>

    <script src="../scripts/workarea.js"></script>
</body>
</html>