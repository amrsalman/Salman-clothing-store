<?php
session_start();
if(isset($_SESSION['home'])){
    if($_SESSION['home']==1){
        ?>

        <?php
    }
}
else{
    header("location:home.php");
}
if(isset($_POST['submit']))
{
    if(!empty($_POST['UserName']) && !empty($_POST['VISANumber']) && !empty($_POST['YourEmail']) && !empty($_POST['Password']) && !empty($_POST['Repeatyourpassword']) )
    {
        $name=$_POST['UserName'];
        $visa=$_POST['VISANumber'];
        $email=$_POST['YourEmail'];
        $pass=$_POST['Password'];
        $repass=$_POST['Repeatyourpassword'];
        $q=0;
        if($pass==$repass){
            try{
                $db=new mysqli('localhost','root','','pro');
                $qrystrr="INSERT INTO `user` (`iduser`, `youremail`, `pasword`, `visanumber`, `level`, `username`) VALUES (NULL,'".$email."', SHA1('".$pass."'), '".$visa."', '0', '".$name."');";
                $rs=$db->query($qrystrr);
                $db->commit();
                $db->close();
                if($rs==1)
                {
                    $q=1;
                    header("location:login.php");
                }

            }catch (exception $e){

            }
            if($q==0){
                ?>
                <script type="text/javascript">
                    alert("There is an account for this email");
                </script>
                <?php
            }
        }
        else{
            ?>
            <script type="text/javascript">
                alert("The password is not equal to the Repeat password");
            </script>
            <?php
        }


    }
    else{
        ?>
        <script type="text/javascript">
            alert("All information must be filled out");
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
    <title>sign up</title>
</head>
<body style="background-image:url('image/login2.jpg')">
<?php
include "hed.php";
?>
<section class="vh-90" style="padding-top: 2em;padding-bottom: 2em" >
    <div class="container h-90">
        <div class="row d-flex justify-content-center align-items-center h-90">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px ;">
                    <div class="card-body p-md-2 " >
                        <div class="row justify-content-center"  >
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form class="mx-1 mx-md-3" action="singup.php" method="post">

                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" name="UserName" class="form-control" />
                                            <label class="form-label" for="form3Example1c">User Name</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <i class="fa-brands fa-cc-visa fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="visanumber" name="VISANumber" class="form-control" />
                                            <label class="form-label" for="form3Example1c">VISA Number</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="form3Example3c" name="YourEmail" class="form-control" />
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4c" name="Password" class="form-control" />
                                            <label class="form-label" for="form3Example4c">Password</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4cd" name="Repeatyourpassword" class="form-control" />
                                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                        </div>
                                    </div>



                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit"  name="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2" >

                                <img src="image/sinup.jpg" style="height: 100% ;width: 100% ;border-radius: 1rem;" class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
<script src="node_modules/jquery/jquery.slim.min.map"></script>
</body>
</html>