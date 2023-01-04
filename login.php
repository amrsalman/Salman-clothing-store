<?php
session_start();
if(isset($_SESSION['home'])){
    if($_SESSION['home']==1){
    $_SESSION['login']=1;
    }
}
else{
    header("location:home.php");
}
if(isset($_POST['submit']))
{
    if(!empty($_POST['YourEmail']) && !empty($_POST['Password']))
    {
        $email=$_POST['YourEmail'];
        $pass=$_POST['Password'];

        try{
            $db=new mysqli('localhost','root','','pro');
            $qrystr="select * from user";
            $res=$db->query($qrystr);
            for($i=0;$i<$res->num_rows;$i++)
            {
                $row=$res->fetch_object();
                if($row->youremail==$email && sha1($pass)==$row->pasword)
                {

                    $_SESSION['isuser']=1;
                    $_SESSION['level']=$row->level;
                    $_SESSION['iduser']=$row->iduser;;
                    $db->close();

                    header("location:home.php");



                }
            }
            {
                ?>
                <script type="text/javascript">
                    alert("Your Email or Password is wrong");
                </script>
                <?php
            }



        }catch (exception $e){

        }

    }
    else{
        ?>
        <script type="text/javascript">
            alert("Your Email or Password is empty");
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
    <title>login</title>
</head>
<body style="background-image:url('image/login2.jpg')">
<?php
include "hed.php";
?>

<section  class="vh-90"  >
    <div class="container py-5 h-900" style="height: auto">
        <div class="row d-flex justify-content-center align-items-center h-90">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-flex d-md-block">
                            <img  src="image/login3.jpg"
                                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; border-radius: 1rem; height: 100%" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-4 text-black">

                                <form action="login.php" method="post">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h1 fw-bold mb-0">Login</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="form2Example17" name="YourEmail" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Your Email</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form2Example27" name="Password" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button class="btn btn-primary btn-lg"  name="submit" type="submit">Login</button>
                                    </div>

                                    <a class="small text-muted" href="passreset.php">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="singup.php"
                                                                                                              style="color: #393f81;">Register here</a></p>

                                </form>

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
