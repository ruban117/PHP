<?php
    session_start();
    session_unset();
    session_destroy();

    echo 'You Have Successfully Logged Out From The System'
?>