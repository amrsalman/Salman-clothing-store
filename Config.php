<?php
$db=new mysqli('localhost','root','','pro');
if(mysqli_connect_error()){
    echo "Failed to connect: ".mysqli_connect_error();
}
?>