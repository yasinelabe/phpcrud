<?php 

function make_connection(){
    $connection = mysqli_connect('localhost','root','','projectms');
    if(!$connection) die("Database connection failed");

    return $connection;
}


?>
