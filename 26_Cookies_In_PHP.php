<?php

    //coolie means some kind of information which is not necerrary for hackers but necessary for you to identify a particular user have to store it into your browser for a cretain period of time
    echo "Welcome to the setting of coockies!<br>";

    setcookie("cookie","Books",time() + 86400,"/");//cookie_name,cookie_value,_expire_time 86400=24hrs,/means throughout website

    echo "Your Cookie Has Been set successfully!";
?>
