<?php

$host = "localhost";
$user = "root";
$pass = "mysql";
$db = "templatetool";
$conn = mysqli_connect($host,$user,$pass) or die ("db error new");
mysqli_select_db($conn,$db) or die ("db error new");
if (mysqli_connect_errno($conn))
{
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
}

?>