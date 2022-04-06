<?php
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: workarea/");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <script src="https://kit.fontawesome.com/1279a1c1cc.js" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://unpkg.com/simple-icons-font@v5/font/simple-icons.min.css"
      type="text/css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="scripts/typed.js"></script>
    <title>Hazlo Todo - Be Organized</title>
</head>
<body>
    <?php
        if(isset($_SESSION['message'])){
            echo "<div class='err_msg'>
            <p>" . $_SESSION['message'] . "</p>
            </div>";
            $_SESSION['message'] = null;
        }
    ?>

    <?php
        if(isset($_SESSION['message_success'])){
            echo "<div class='success_msg'>
            <p>" . $_SESSION['message_success'] . "</p>
            </div>";
            $_SESSION['message_success'] = null;
        }
    ?>

    <div class="modalContainer">
        <div class="loginModal FadeIn">
            <button class="closeLogin">
                <i class="fa fa-x"></i>
            </button><br/><br/>

            <h1>
                Login And <span id="loginPhrase"></span>
            </h1>

            <div class="mainForm">
                
                <br/>
                <form method="post" action="validations/login.php">
                    <input type="text" placeholder="Enter Your Username" class="usernameLogin" name="usernameLogin">
                    <label class="nameLabelLogin"></label>
                    <input type="text" placeholder="Enter Your Email" class="emailLogin" name="emailLogin">
                    <label class="emailLabelLogin"></label>
                    <input type="password" class="passwordLogin" placeholder="Enter Your Password" name="passwordLogin">
                    <label class="passwordLabelLogin"></label>
                    <button class="submitLogin" type="submit">
                        Login <i class="fa fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>


        <div class="signUpModal FadeIn">
            <button class="closeSignUp">
                <i class="fa fa-x"></i>
            </button>

            <h1>
                Signup And Be Dazzled!!
            </h1>

            <div class="mainForm">
                <form method="post" action="validations/signup.php">
                    <input type="text" class="Firstname" name="Firstname" placeholder="Enter Your First Name">
                    <input type="text" class="LastName" name="LastName" placeholder="Enter Your Last Name">
                    <input type="text" class="OtherNames" name="OtherNames" placeholder="Enter Your Other Names">
                    <input type="text" class="usernameSignup" name="userNameSignup" placeholder="Choose A Username">
                    <input type="password" class="passwordSignup" name="passwordSignup" placeholder="Choose A Password">
                    <input type="password" class="confirmPassword" name="confirmPassword" placeholder="Confirm The Password">
                    <input type="text" class="emailSignup" name="emailSignup" placeholder="Enter Your Email">
                    <input type="text" class="gender" name="gender" placeholder="Male Or Female">
                    <button class="submitSignup" type="submit">
                        Create Account
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="topper">
        <h1 class="logo">
            Hazlo Todo
        </h1>

        <ul class="menu">
            <li class="home">HOME</li>
            <li class="about">ABOUT</li>
            <li class="support">SUPPORT</li>
            <li class="contact-top">CONTACT</li>
        </ul>

        <div class="buttons">
            <button class="login">
                Login <i class="fa-solid fa-arrow-right"></i>
            </button>
            <p>|</p>
            <button class="signUp">
                Sign Up <i class="fa-solid fa-user-plus"></i>
            </button>
        </div>
        <button class="navBtn">
            <i class="fa fa-bars-staggered"></i>
        </button>
    </div>

    <div class="landing">
        <div class="writeUp">
            <h1>
                HAZLO TODO
            </h1>

            <h3>
                BE
                <span id="catchPhrases"></span>
                WITH HAZLO TODO
            </h3><br/>
            <p>
                Become A Member Of The Hazlo Todo Community Today.<br/>
                Start Managing Your Activities With Us.
            </p><br/>
            <button class="landingSignUp">
                CREATE AN ACCOUNT <i class="fa-solid fa-circle-plus"></i>
            </button>
        </div>
        <div class="images">

        </div>
    </div>

    <div class="contact-and-info">
        <div class="container">
            <div class="info Showright">
                <h1>ABOUT</h1><br/>
                <p>
                    Hazlo Todo is a server based and web based application with special features to suite several 
                    needs for many individuals in the world; both professional and unprofessional.<br/>With Hazlo Todo, you can do the 
                    regular things you do in a basic to-do application and with a few new features, for example accessing your activities 
                    from anywhere in the world.<br/>Try out Hazlo Todo and enjoy!!
                </p><br/>
                <button class="infoSignUp">
                    Sign Up <i class="fa-solid fa-user-plus"></i>
                </button>
            </div>
            <div class="contact Showleft">
                <h2>
                    Subscribe To Mailing List?
                </h2>
                <form>
                    <input type="text" placeholder="YourEmail@example.com" class="mailingListEmail">
                    <label class="mailListLabel"></label><br/>
                    <button type="submit" class="submitEmail">SUBSCRIBE</button>
                </form>
            </div>
        </div><br/><br/>

        <div class="social Showdown">
            <a><i class="si si-whatsapp si--color icons"></i></a>
            <a><i class="si si-facebook si--color icons"></i></a>
            <a><i class="si si-instagram si--color icons"></i></a>
            <a><i class="si si-github si--color icons"></i></a>
        </div><br/><br/>

        <p>copyright &copy; 2022 Hazlo Todo</p>
    </div>

    <div class="infoDiv Showdown">
        <p class="message"></p>
    </div>

    <div class="mobileNavContainer">
        <div class="mobileNav right">
            <button class="closeNav">
                <i class="fa fa-arrow-right"></i>
            </button><br/>
            <ul class="mobileMenu">
                <li class="home">HOME</li>
                <li class="about">ABOUT</li>
                <li class="support">SUPPORT</li>
                <li class="contact-top">CONTACT</li>
            </ul>
            <div class="buttonsMobile">
                <button class="loginMobile">
                    Login <i class="fa fa-arrow-right"></i>
                </button>
                <button class="signupMobile">
                    Sign Up <i class="fa fa-user-plus"></i>
                </button>
            </div>
        </div>
    </div>

    <script src="scripts/main.js"></script>
</body>
</html>