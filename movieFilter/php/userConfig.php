<?php
session_start();
include "test.php";
 
$result = $connection->query("SELECT * FROM preferences WHERE id = '{$_SESSION['id']}'");

if($result)
{
    $result = $result->fetch_assoc();
    print ($result["channels"]);
    exit();
}
else
{
    exit();
}

?>