<?php
    session_start();
    session_destroy();
    header("location:../Books/Index.php");

?>