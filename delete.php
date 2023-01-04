<?php
$db=new mysqli('localhost','root','','pro');
if(isset($_GET['deleteds'])){
    $id=$_GET['deleteds'];
    $sql="DELETE FROM `products` WHERE idproduct='".$id."'";
    $res=mysqli_query($db,$sql);
    if($res)
    {
        mysqli_close($db); // Close connection
        header("location:show.php"); // redirects to all records page
        exit;
    }
    else{
        header("location:home.php");
    }
}

?>