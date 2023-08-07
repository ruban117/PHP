<?php
    echo "Welcome to the setting of coockies!<br>";

    setcookie("cookie","Books",time() + 86400,"/");//cookie_name,cookie_value,_expire_time 86400=24hrs,/means throughout website

    echo "Your Cookie Has Been set successfully!";
?>
