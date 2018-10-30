<?php
        //Connect to the database
    $host = "127.0.0.1";
    $user = "amritsandhu";                     //Your Cloud 9 username
    $pass = "";                                  //Remember, there is NO password by default!
    $db = "test";
    //Your database name you want to connect to
    $port = 3306;                                //The port #. It is always 3306
    
    $connection = new mysqli($host, $user, $pass, $db, $port);
    if($connection->connect_errno)
    {
        print "Connection Error";
    }

?>