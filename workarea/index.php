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
    <script src="../scripts/typed.js"></script>
</head>
<body class="light">
    <div class="workarea_topper">
        <div class="profile_fullname">
            <div class="circle"></div>
            <p class="user_fullname"></p>
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

                <div class="mainDropdown closeByHeight noShadow">
                    <div class="mainDropdown_options">
                        <i class="fa fa-user"></i>
                        Your Profile
                    </div>
                    <div class="dashboardOption mainDropdown_options">
                        <i class="fa fa-house"></i>
                        Dashboard
                    </div>
                    <div class="activitiesOption mainDropdown_options">
                        <i class="fa fa-chart-line"></i>
                        Your Activities
                    </div>
                    <div class="archiveOption mainDropdown_options">
                        <i class="fa fa-box-archive"></i>
                        Your Archives
                    </div>
                    <div class="trashOption mainDropdown_options">
                        <i class="fa fa-trash-can"></i>
                        Trash Bin
                    </div>
                    <div class="starredOption mainDropdown_options">
                        <i class="fa fa-star"></i>
                        Starred Activities
                    </div>
                    <div class="completeOption mainDropdown_options">
                        <i class="fa fa-square-check"></i>
                        Completed
                    </div>
                    <hr>
                    <div class="settings mainDropdown_options">
                        <i class="fa fa-gear"></i>
                        Settings
                    </div>
                    <div class="signout mainDropdown_options">
                        <i class="fa fa-right-to-bracket"></i>
                        Sign Out
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="workarea_container">
        <div class="workarea_nav">
            <div class="logo_sitename">
                <img src="../images/hazlo logo transparent.png" alt="Hazlo Todo Logo">
                <p class="sitename">Hazlo Todo</p>
                <p class="workarea_motto">
                    Get More<span id="workarea_motto_catchphrases"></span>
                </p>
            </div>
            <div class="dashboardOption workarea_nav_options active">
                <i class="fa fa-house"></i>
                <p class="textDashboard">Dashboard</p>
            </div>

            <div class="activitiesOption workarea_nav_options">
                <i class="fa fa-chart-line"></i>
                <p class="textActivities">Activities</p>
            </div>

            <div class="archiveOption workarea_nav_options">
                <i class="fa fa-box-archive"></i>
                <p class="textArchive">Archives</p>
            </div>

            <div class="trashOption workarea_nav_options">
                <i class="fa fa-trash-can"></i>
                <p class="textTrash">Trash Bin</p>
            </div>

            <div class="starredOption workarea_nav_options">
                <i class="fa fa-star"></i>
                <p class="textStarred">Starred</p>
            </div>

            <div class="completeOption workarea_nav_options">
                <i class="fa fa-square-check"></i>
                <p class="textComplete">Completed</p>
            </div>
        </div>
        <div class="workarea_main">

        </div>
    </div>

    <script src="../scripts/workarea.js"></script>
</body>
</html>