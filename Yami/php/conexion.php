<?php

$user="root";
$pass="";
$server="localhost";
$db="hospital";

$conn= mysqli_connect($server,$user,$pass,$db);
 
if($conn->connect_errno){
    die("la conexión ha fallado".$conn->connect_errno);
}
else{
    echo "";
}

?>