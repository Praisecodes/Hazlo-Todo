<?php
    setcookie("usersname", $_SESSION["username"], time()-1, "/");
    $_SESSION["username"] = null;
    header("Location: ../");
?>