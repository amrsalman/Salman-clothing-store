<?php
session_start();
if(isset($_SESSION['login'])){
    if($_SESSION['login']==1){
        ?>

        <?php
    }
}
else{
    header("location:login.php");
}?>
<?php
    if(isset($_POST['ResetPassword']))
    {
    if(!empty($_POST['email']) )
    {
    $email=$_POST['email'];
    $code=uniqid(true);


    $f=0;

    try{
    $db=new mysqli('localhost','root','','pro');
    $qrystr="select * from user";
    $res=$db->query($qrystr);
    for($i=0;$i<$res->num_rows;$i++)
    {
    $row=$res->fetch_object();
    if($row->youremail==$email )
    {

        $dt=new mysqli('localhost','root','','pro');
        $qryst="INSERT INTO `resetpassword` (`id`, `code`, `email`) VALUES (NULL, '".$code."', '".$email."');";
        $rs=$dt->query($qryst);
        $dt->commit();
        $dt->close();
        if($rs!=1){
            echo "not test";
        }

        $f=1;
        try{
            require_once 'mail.php';

            $mail->setFrom('s11941434@stu.najah.edu', 'Salman');
            $mail->addAddress($email);
            $url="http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/resetPassword.php?code=$code";
            $mail->isHTML(true);
            $mail->Subject = 'your password reset link';
            $mail->Body    = "<h1>You requested a password reset</h1>
                                 Click <a href='".$url."'>this link</a>  to do so";
            $mail->send();
            echo 'Reset password link has been sent to your email';
            header("location:login.php");
        }catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }exit();




    }
    }
    if($f==0){
    ?>
    <script type="text/javascript">
        alert("Your Email  is wrong");
    </script>
<?php
}



}catch (exception $e){

}

    }
    else{
    ?>
    <script type="text/javascript">
        alert("Your Email is empty");
    </script>
    <?php
}

}
?>


<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="stayle/homecss.css" rel="stylesheet">
    <script src="node_modules/jquery/dist/jquery.min.js" ></script>
    <script src="script/homescript.js" ></script>
    <title>Reset Password</title>
</head>
<body style="background-image:url('image/login2.jpg')">
<?php
include "hed.php";
?>
<section  >
    <div class="container" style="
background-color: white;width: 400px;height: 300px;margin-top: 12% ;padding-top: 20px;border-radius: 1em;opacity: 0.8">

        <div class="row">
            <h2 style="text-align: center">
                Forget Password:
            </h2>
        </div>
        <div class="row">
            <p style="text-align: center">
                You can reset your password here.
            </p>
        </div>
        <form action="passreset.php" method="post">
            <div class="d-flex flex-row align-items-center mb-3">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="email" placeholder="email" name="email" id="form3Example3c" class="form-control" />

                </div>

            </div>
            <div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary btn-lg" name="ResetPassword" type="submit">Reset Password</button>
                </div>
            </div>
        </form>
    </div>
</section>

<footer class=" text-center fixed-bottom text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a target="_blank"
               class="btn btn-primary btn-floating m-1"
               style="background-color: #3b5998;"
               href="https://www.facebook.com/profile.php?id=100003399031344"
               role="button"
            ><i class="fab fa-facebook-f"></i
                ></a>




            <!-- Instagram -->
            <a target="_blank"
               class="btn btn-primary btn-floating m-1"
               style="background-color: #ac2bac;"
               href="https://l.facebook.com/l.php?u=https%3A%2F%2Finstagram.com%2Fdyaa_talal%3Figshid%3DYmMyMTA2M2Y%253D%26fbclid%3DIwAR0Ew3bRjuQCLYnUkYbkb74VlAgLlomVJp-6LYJ6aNafHOHmXVcf7BeR04Q&h=AT05vUAyA_5kCnPTw-pK87RS9L3TW5xCFwND3ff6P_qutvkOvoZsvJ1dXA2eldFeqFKcPL-hs_UPl80bcr6xyHVN_DIsULMZV4HhlFqnyT7UZhTv4eegi_UuMlZSAkUb0kjByA"
               role="button"
            ><i class="fab fa-instagram"></i
                ></a>
            <!-- Twitter -->
            <a target="_blank"
               class="btn btn-primary btn-floating m-1"
               style="background-color: #55acee;"
               href="https://l.facebook.com/l.php?u=https%3A%2F%2Ftwitter.com%2FAmrSalm48415801%3Ft%3DGJ-OWSJPbDc-ts2uFk9pQw%26s%3D07%26fbclid%3DIwAR0_jlRcpLdNeA8gnCKpQFH_Y8Ic4RAZ7M-OByyQMAe3foS-QuSlxNvnv8c&h=AT1FfSQfAznxO6fxpzfVfgzFqVqF5bVg0dPDHqSmmpfwVpn5ZUDHeTG5RC8iz-PDyRvEyQY0YLLV9T3AnXJ3eApH4ev1_C-nEHhIBz8jHTRxiJDgXvSK9_-vYpK7pifkrbxvLg"
               role="button"
            ><i class="fab fa-twitter"></i
                ></a>




        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: blueviolet;">

        <a class="text-white" href="https://mdbootstrap.com/" style="text-decoration-line: none;color: deeppink !important;font-size:20px ; ">Salman</a>
    </div>
    <!-- Copyright -->
</footer>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
<script src="node_modules/jquery/jquery.slim.min.map"></script>
</body>
</html>
