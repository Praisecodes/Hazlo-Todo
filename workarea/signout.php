<?php
    setcookie("usersname", $_SESSION["username"], time()-1, "/");
    header("Location: ../");
?>