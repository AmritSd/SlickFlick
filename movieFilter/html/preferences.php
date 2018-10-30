<?php
    include "header.php";
?>
<link rel="stylesheet" href="../include/preferences.css" media='screen and (min-device-width: 800px)'>
<link rel="stylesheet" href="../include/preferencesMobile.css" media='screen and (max-device-width: 800px)'>

<script>

$().ready(function()   
    {
    $("#movie_channel").css("display","none");
    var channels = ["&-pictures","asianet-movies","b4u-movies","cinema-tv","enterr-10","filmy","gemini-movies","hbo","hbo-defined","hbo-hits","india-talkies","jalsha-movies","jaya-movie","kiran-tv","ktv","ktv-hd","maa-movies","mgm","movies-now","movies-now-plus","movies-ok","raj-digital-plus","romedy-now","sony-max","sony-max-2","sony-pix","star-gold","star-gold-hd","star-movies","star-movies-action","star-movies-hd","udaya-movies","utv-action","utv-movies","wb","world-movies","zee-action","zee-cinema","zee-cinema-hd","zee-classic","zee-premier","zee-studio","zee-studio-hd","zee-talkies"];
    for(var i = 0;i < channels.length ; i++)
    {
        var div = document.createElement("div");
        div.setAttribute("class","alert alert-info");
        var input = document.createElement("input");
        if($(document).width() > 799)
        {
            input.setAttribute("class","form-control");
        }
        //
        input.setAttribute("type","checkbox");
        input.setAttribute("name",channels[i]);
        div.innerHTML = channels[i];
        document.getElementById("movie_channel").appendChild(div);
        div.appendChild(input);


    }
    $("#mainTab").click(function(){
        console.log("click");
        $("#movie_channel").css("display","block");
    });
    });
    function checkReturn()
    {
        if($("#movie_channel").css("display") == "none")
        {
            return false;
        }
        else
        {
            return true;
        }
    }
</script>

<?php
    include "header1.php";
?>

<div class="alert alert-danger" id="mainTab"><strong>Set channel preferences  - (Only those selected will displayed on the main page)<button id="showButton">Show</button></div>
<form id="movie_channel_form"  action="../php/preferences.php" method="POST" class="form-group" onclick="return checkReturn();">
    <div id="movie_channel" class="list-group"></div>
    <input type="submit" value="Save" id="submitButton" class="btn btn-warning">
</form>


<?php
    include "footer.php";
?>