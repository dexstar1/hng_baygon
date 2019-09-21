<?php
    session_start();  
    session_destroy();  
    header("location:sign_in/final_sign_in.php");  
?>