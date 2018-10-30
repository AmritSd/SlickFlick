<?php
    session_start();
    include "header.php";
?>

<link rel="stylesheet" href="../include/signup_form.css" media="screen and (min-device-width: 800px)">
<link rel="stylesheet" href="../include/signup_formMobile.css" media="screen and (max-device-width: 800px)">

<?php
    include "header1.php";
?>

<?php
    if(isset($_GET["wrongpass"]))
    {
        print '<div id="alert" class="alert alert-info"><strong>Sorry!</strong>Invalid username or password</div>';
    }
    else
    {
        print '<div id="alert" class="alert alert-info"><strong>Log in to MovieFilter</strong></div>';
    }
?>

        <form action="../php/login.php" class="form-group"  id="movie_form" method="POST" name="form">
            <input type="text" name="username" class="form-control" placeholder="User name">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <input type="submit" class="btn btn-danger" value="Log in">
        </form>

<?php
    include "footer.php";
?>