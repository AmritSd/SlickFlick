<?php
    session_start();
    include "test.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $result = $connection->query("SELECT * FROM users WHERE username ='" . $_POST["username"]. "'");
        $result = $result->fetch_assoc();
        $verify = false;

        if(isset($result["id"]) && isset($result["pass"]))
        {
            $verify =  password_verify($_POST['password'],$result['pass']);
        }

        if($verify)
        {
            $_SESSION["id"] = $result["id"];
            $_SESSION["name"] = $result["username"];

            header("Location: http://moviefilter-amritsandhu.c9users.io/movieFilter/html/home.php");
            exit();
        }
        else
        {
            header("Location: http://moviefilter-amritsandhu.c9users.io/movieFilter/html/login.php?wrongpass=true");
            exit();
        }
    }
    else
    {
        header("Location: https://moviefilter-amritsandhu.c9users.io/movieFilter/html/home.php");
        exit();
    }
?>