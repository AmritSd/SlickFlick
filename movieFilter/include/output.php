<?php

    if(isset($_GET["date"]))
    {
        $name = "latest/" . $_GET["date"] . ".json";
        header("Location: https://moviefilter-amritsandhu.c9users.io/movieFilter/include/" . $name);
        exit();
    }
    else
    {
        $name = "latest/" . date("Y-m-d") . ".json";
        header("Location: https://moviefilter-amritsandhu.c9users.io/movieFilter/include/" . $name);
        exit();
    }
    
?>