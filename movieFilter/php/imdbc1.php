
<?php
$channel = ["&-pictures","asianet-movies","b4u-movies","cinema-tv","enterr-10","filmy","gemini-movies","hbo","hbo-defined","hbo-hits","india-talkies","jalsha-movies","jaya-movie","kiran-tv","ktv","ktv-hd","maa-movies","mgm","movies-now","movies-now-plus","movies-ok","raj-digital-plus","romedy-now","sony-max","sony-max-2","sony-pix","star-gold","star-gold-hd","star-movies","star-movies-action","star-movies-hd","udaya-movies","utv-action","utv-movies","wb","world-movies","zee-action","zee-cinema","zee-cinema-hd","zee-classic","zee-premier","zee-studio","zee-studio-hd","zee-talkies"];

$number = date("Y-m-d",strtotime("-1 days")) . ".json";

if(file_exists( __DIR__ . "/../include/latest/" .$number))
{
    unlink( __DIR__ . "/../include/latest/" . $number);
}


$date = date("Y-m-d",strtotime("+5 days"));

$file = fopen( __DIR__ . "/../include/latest/" . $date . ".json","w");

fwrite($file,"[");
for($a = 0;$a < count($channel);$a++)
{
    $json= @file_get_contents("https://indian-tv-schedule-api.appspot.com/schedule?channel={$channel [$a]}&date={$date}&details=True&indent=");
    for($i = 0;empty($json)  && $i < 2;$i++)
    {
        $json= @file_get_contents("https://indian-tv-schedule-api.appspot.com/schedule?channel={$channel [$a]}&date={$date}&details=True&indent=");
    }
    if($json != false)
    {
        fwrite($file,$json);
        if($a != count($channel) - 1)
        {
            fwrite($file,",");
        }
        
    }

}
fwrite($file,"]");
fclose($file);

?>
 



