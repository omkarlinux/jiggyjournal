<?php
    session_start();
    unset($_SESSION['userid']);
    unset($_SESSION['fname']);
    
    echo "User logged out successfully";
?>