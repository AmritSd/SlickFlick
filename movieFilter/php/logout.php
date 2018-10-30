<?php
    session_start();
    session_destroy();
    header("Location: http://moviefilter-amritsandhu.c9users.io/movieFilter/html/home.php");
?>