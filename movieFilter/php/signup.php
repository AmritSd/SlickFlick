<?php
    session_start();

    include "test.php";
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $result = $connection->query("INSERT INTO users(name,pass,email,username) VALUES ('{$_POST['name']}','{$hash}','{$_POST['email']}','{$_POST['username']}')");
        
        if(!$result)
        {
            header("Location: http://moviefilter-amritsandhu.c9users.io/movieFilter/html/signup.php?message=You%20already%20have%20an%20account%20or%20an%20error%20ocuured");
            exit();
        }
        else
        {
            

            print "Congratulations! You are now signed up to MovieFilter";
            
            $result = $connection->query("SELECT * FROM users WHERE email = '{$_POST['email']}'");
            if(!$result)
            {
                print "F***";
                exit();
            }
            $result = $result->fetch_assoc();
            $_SESSION["id"] = $result["id"];
            $_SESSION["name"] = $result["username"];

            $result_1 = $connection->query("INSERT INTO preferences(id) VALUES ('{$result['id']}')");
            header("Location: http://moviefilter-amritsandhu.c9users.io/movieFilter/html/home.php?message=Congratulations%20you%20are%20now%20signed%20up");
            exit();
        }
    }
    exit();

?>