<?php

// start session 
session_start();


//clear all variable and session
session_unset();
//destroy session
session_destroy();


header("location: login.php");
exit();
?>