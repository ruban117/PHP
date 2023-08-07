<?php
    session_start();
    if(isset($_SESSION['username'])){
        echo 'Welcome:- '.$_SESSION['username'];
        echo '<br>Your Favourite Color Is:- '.$_SESSION['favcolor'];
    }else{
        echo 'Session Expired Please Login To Continue';
    }
?>