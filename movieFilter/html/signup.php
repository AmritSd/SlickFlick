<?php
    include "header.php";
?>

<link rel="stylesheet" href="../include/signup_form.css" media="screen and (min-device-width: 800px)">
<link rel="stylesheet" href="../include/signup_formMobile.css" media="screen and (max-device-width: 800px)">
    
<script>
    function validate()
    {
        
        var alertdiv = document.createElement("div");
        alertdiv.setAttribute("class" , "alert alert-danger");
        alertdiv.setAttribute("id" , "alert");
        var password = document.forms["form"]["password"].value;
        if(password != document.forms["form"]["conformation"].value)
        {
            alertdiv.innerHTML = "Passwords do not match";
            document.getElementById("body").appendChild(alertdiv);
            return false;
        }
        if(password.length < 6 || password.length > 15)
        {
            alertdiv.innerHTML = "Please enter a password between 5-15 characters";
            document.getElementById("body").appendChild(alertdiv);
            return false;
        }
        var x = document.forms["form"]["email"].value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
            alertdiv.innerHTML = "Invalid email address";
            document.getElementById("body").appendChild(alertdiv);
            return false;
        }
        return true;
    }
</script>
    
<?php
    include "header1.php";
    if(isset($_GET["username"]))
    {
        print '<div id="alert" class="alert alert-info"><strong>Sorry username is already in use.Please select another username</strong></div>';
    }
    else if(!isset($_GET["message"]))
    {
        print '<div id="alert" class="alert alert-info"><strong>Sign Up! to MovieFilter</strong></div>';
    }
?>


        <form action="../php/signup.php" class="form-group"  id="movie_form" method="POST" onsubmit="return validate()" name="form">
            <input type="text" name="name" class="form-control" placeholder="Name">
            <input type="text" name="username" class="form-control" placeholder="User name">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <input type="password" name="conformation" placeholder="Conformation" class="form-control"> 
            <input type="text" name="email" class="form-control" placeholder="Email">
            <input type="submit" class="btn btn-danger" value="SignUp">
        </form>

<?php
    include "footer.php";
?>