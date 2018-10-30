<?php
    session_start();
    include "test.php";

    $channels = ["&-pictures","asianet-movies","b4u-movies","cinema-tv","enterr-10","filmy","gemini-movies","hbo","hbo-defined","hbo-hits","india-talkies","jalsha-movies","jaya-movie","kiran-tv","ktv","ktv-hd","maa-movies","mgm","movies-now","movies-now-plus","movies-ok","raj-digital-plus","romedy-now","sony-max","sony-max-2","sony-pix","star-gold","star-gold-hd","star-movies","star-movies-action","star-movies-hd","udaya-movies","utv-action","utv-movies","wb","world-movies","zee-action","zee-cinema","zee-cinema-hd","zee-classic","zee-premier","zee-studio","zee-studio-hd","zee-talkies"];
       
    $insert = "";
    for($i = 0;$i < count($channels);$i++)
    {
        if(isset($_POST[$channels[$i]]))
        {
            $insert = $insert . '1';
        }
        else
        {
            $insert = $insert . '0';
        }
    }
    
    $result = $connection->query("UPDATE preferences SET channels = '{$insert}' WHERE id = '{$_SESSION['id']}'");
    if($result)
    {
        header("Location: http://moviefilter-amritsandhu.c9users.io/movieFilter/html/home.php?message=Your%20preferences%20have%20been%20saved");
        exit();
    }

?>