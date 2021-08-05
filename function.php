<?php 

function make_connection(){
    $connection = mysqli_connect('localhost','root','Maxamed@@123','projectms');
    if(!$connection) die("Database connection failed");

    return $connection;
}


?>