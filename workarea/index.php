<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hazlo Todo | Workarea</title>
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/1279a1c1cc.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="workarea_topper">
        <div class="profile_fullname">
            <div class="circle"></div>
            <p class="user_fullname">Precious Okeypraise .C.</p>
        </div>

        <form class="search_activity">
            <input type="search" name="search_activity_input" placeholder="Search your activities..." id="search_activity_input" class="search_activity_input">
            <button type="submit">
                <i class="fa fa-magnifying-glass"></i>
            </button>
        </form>

        <div class="topper_icons">
            <button class="switchMode topperIcons">
                <i class="fa fa-moon"></i>
            </button>

            <button class="notifications topperIcons">
                <i class="fa fa-bell"></i>
            </button>

            <button class="addActivity topperIcons">
                <i class="fa fa-plus"></i>
            </button>

            <div class="icon_dropdown">
                <div class="user_circle">
                    <i class="fa fa-user"></i>
                </div>
                <div class="drop_arrow">
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="workarea_container">
        <div class="workarea_nav">
            
        </div>
        <div class="workarea_main">

        </div>
    </div>

    <script src="../scripts/workarea.js"></script>
</body>
</html>