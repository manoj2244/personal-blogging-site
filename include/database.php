<?php

$server="localhost";
$username="root";
$password="";
$database="uvraj_database";

$db= mysqli_connect($server,$username,$password,$database);

if(!$db)
{
    echo die(mysqli_connect_error());
}
?>