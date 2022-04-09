<?php
    session_start();
    setcookie("usersname", "", time()-1, "/");
    setcookie("fullname", "", time()-1, "/");
    $_SESSION["userFname"] = null;
    $_SESSION["username"] = null;
    header("Location: ../");
?>