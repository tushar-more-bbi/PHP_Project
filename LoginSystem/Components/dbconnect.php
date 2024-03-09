<?php
$servername="127.0.0.1";
$username="root";
$password="Bbim@1030";
$database="users";

//Create a connection
$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Sorry we failed to connect" . mysqli_connect_error());
}


?>