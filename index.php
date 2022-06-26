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
    <div class="header">
        <h1 class="siteTitle">
            Hazlo Todo
        </h1>

        <ul class="navList">
            <li class="home"><a href="./">HOME</a></li>
            <li class="about"><a href="./about">ABOUT</a></li>
            <li class="support"><a href="./support">SUPPORT</a></li>
            <li class="contact"><a href="">CONTACT</a></li>
        </ul>

        <div class="header_buttons">
            <button class="loginBtn">LOGIN</button>
            <button class="signupBtn">SIGN UP</button>
        </div>
    </div>

    <div class="mainPage">
        <div class="mainStuff">
            <h1 class="siteName">HAZLO TODO</h1>
            <h3 class="tagPhrases">
                BE <span id="catchPhrases"></span> WITH HAZLO TODO.
            </h3><br/>

            <p class="text">
                Become A Member Of The Hazlo Todo Community Today.<br/>Start Managing Your Activities With Us.
            </p><br/>
            <button class="signupBtn">Create A Free Account</button>
        </div>
        <div class="image"></div>
    </div>

    <div class="footerPage">
        <div class="about">
            <p>
                Hazlo Todo is a server based project management system that helps manage all projects from professional
                to leisure projects on all ocassions to help keep you updated no matter where you are.<br/>With our highly
                secure servers, we assure that your information is certainly kept safe and sound and also very easy for you
                to access wherever.<br/>Get Started With Us Today.
            </p><br/>
            <button class="signupBtn">Create A Free Account</button>
        </div>

        <div class="subscribe">
            <h3>Get Latest Updates?</h3>
            <form>
                <input type="email" name="email" id="Email" class="Email" placeholder="Enter Your Email">
                <button type="submit" class="subscribeBtn">Subscribe</button>
            </form>
        </div>
    </div>

    <script src="scripts/main.js"></script>
</body>
</html>