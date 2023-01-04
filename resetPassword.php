<?php
include "Config.php";
if(!isset($_GET["code"])){
    exit("Can't find page");
}
$code=$_GET["code"];
$getemailqruery=mysqli_query($db,"SELECT `email` FROM `resetpassword` WHERE `code`='".$code."'");
if(mysqli_num_rows($getemailqruery)==0){
    exit("Can't find page");
}else{
    if(isset($_POST['password'])){
        $pw=$_POST['password'];
        $pw=sha1($pw);
        $row=mysqli_fetch_array($getemailqruery);
        $email=$row["email"];
        $query=mysqli_query($db,"UPDATE `user` SET `pasword`='".$pw."' WHERE `youremail`='".$email."'");
        if($query){
            $query=mysqli_query($db,"DELETE FROM `resetpassword` WHERE `code`='".$code."'");
            exit("password updated");
        }
        else{
            exit("Something went wrong");
        }

    }
}

?>
<form  method="post">
    <input type="password" name="password" placeholder="New password">
    <br>
    <input type="submit" name="submit" value="Update password">
</form>
