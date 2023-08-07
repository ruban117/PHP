<?php
    echo "Welcome to the setting of coockies!<br>";

    setcookie("cookie","Books",time() + 86400,"/");

    echo "Your Cookie Has Been set successfully!";
?>