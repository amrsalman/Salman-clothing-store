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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="stayle/homecss.css" rel="stylesheet">
    <link rel="stylesheet" href="stayle/P-Style.css">
    <script src="node_modules/jquery/dist/jquery.min.js" ></script>
    <script src="script/homescript.js" ></script>
    <title>Women</title>
</head>
<body>
<?php
include "hed.php";
?>

<section id="slides">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/wo-dress.jpg" width="800" height="600" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Womesn's Collection</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/wo-sp.jpg" width="800" height="600" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Sport</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/wo-dress.jpg" width="800" height="600" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Dresses</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/women.jpg" width="800" height="600" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Suites</h5>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section   id="Products" class="Products">

    <div  class="container">
        <div style="padding: 10px" class="row">

            <h2 class="prod_head" >Pants</h2>
            <div style="padding: 10px ;" class="col ad">
                <?php
                $db=new mysqli('localhost','root','','pro');
                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }else {
                    $sql = "SELECT * FROM products WHERE `department`='Women' and `type`='Pants' ORDER by `idproducts` DESC";


                    $res = mysqli_query($db,$sql);
                }
                if ($res) {
                    // output data of each row

                    while($row =mysqli_fetch_assoc($res)) {
                        /*  echo "id: " . $row["idproduct"]. " - Name: " . $row["department"]. " " . $row["department"]. "<br>";*/
                        $disc=$row['description'];
                        $price=$row['price'];
                        $size=$row['size'];
                        $idp=$row['idproducts'];
                        ?>
                        <div class="card as " style="min-width: 300px;margin-left: 10px">
                            <img style="width: 300px;height: 300px" class="card-img-top"  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>"/>
                            <div class="card-body  " onmouseover="this.style.backgroundColor ='blueviolet'" onmouseleave="this.style.backgroundColor ='white'" >
                                <h5 class="card-title"><?php echo $price.'$'?></h5>
                                <h6 class="card-title"><?php echo $size?></h6>
                                <p class="card-text"><?php echo $disc?></p>
                                <form method="post" action="women.php">
                                    <input type="text" id="idp" name="idp" style="display: none" value="<?php echo $idp;?>">

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button  name="buy" id="buy" class="btn btn-primary btn-lg" href="" type="submit">Buy</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php
                    }
                }
                else {
                    echo "0 results";
                }
                ?>
            </div>
            <h2 class="prod_head" >Shirts:</h2>
            <div style="padding: 10px ;" class="col ad">
                <?php
                $db=new mysqli('localhost','root','','pro');
                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }else {
                    $sql = "SELECT * FROM products WHERE `department`='Women' and `type`='Shirts' ORDER by `idproducts` DESC";


                    $res = mysqli_query($db,$sql);
                }
                if ($res) {
                    // output data of each row

                    while($row =mysqli_fetch_assoc($res)) {
                        /*  echo "id: " . $row["idproduct"]. " - Name: " . $row["department"]. " " . $row["department"]. "<br>";*/
                        $disc=$row['description'];
                        $price=$row['price'];
                        $size=$row['size'];
                        $idp=$row['idproducts'];
                        ?>
                        <div class="card as " style="min-width: 300px;margin-left: 10px">
                            <img style="width: 300px;height: 300px" class="card-img-top"  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>"/>
                            <div class="card-body  " onmouseover="this.style.backgroundColor ='blueviolet'" onmouseleave="this.style.backgroundColor ='white'" >
                                <h5 class="card-title"><?php echo $price.'$'?></h5>
                                <h6 class="card-title"><?php echo $size?></h6>
                                <p class="card-text"><?php echo $disc?></p>
                                <form method="post" action="women.php">
                                    <input type="text" id="idp" name="idp" style="display: none" value="<?php echo $idp;?>">

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button  name="buy" id="buy" class="btn btn-primary btn-lg" href="" type="submit">Buy</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php
                    }
                }
                else {
                    echo "0 results";
                }
                ?>
            </div>
            <h2 class="prod_head" >Dresses:</h2>
            <div style="padding: 10px ;" class="col ad">
                <?php
                $db=new mysqli('localhost','root','','pro');
                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }else {
                    $sql = "SELECT * FROM products WHERE `department`='Women' and `type`='Dresses' ORDER by `idproducts` DESC";


                    $res = mysqli_query($db,$sql);
                }
                if ($res) {
                    // output data of each row

                    while($row =mysqli_fetch_assoc($res)) {
                        /*  echo "id: " . $row["idproduct"]. " - Name: " . $row["department"]. " " . $row["department"]. "<br>";*/
                        $disc=$row['description'];
                        $price=$row['price'];
                        $size=$row['size'];
                        $idp=$row['idproducts'];
                        ?>
                        <div class="card as " style="min-width: 300px;margin-left: 10px">
                            <img style="width: 300px;height: 300px" class="card-img-top"  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>"/>
                            <div class="card-body  " onmouseover="this.style.backgroundColor ='blueviolet'" onmouseleave="this.style.backgroundColor ='white'" >
                                <h5 class="card-title"><?php echo $price.'$'?></h5>
                                <h6 class="card-title"><?php echo $size?></h6>
                                <p class="card-text"><?php echo $disc?></p>
                                <form method="post" action="women.php">
                                    <input type="text" id="idp" name="idp" style="display: none" value="<?php echo $idp;?>">

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button  name="buy" id="buy" class="btn btn-primary btn-lg" href="" type="submit">Buy</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php
                    }
                }
                else {
                    echo "0 results";
                }
                ?>
            </div>
        </div>
    </div>

</section>


<?php
include "footer.php";
?>
<?php
if(isset($_POST['buy'])){

    if(isset($_SESSION['isuser'])){
        $id=$_SESSION['iduser'];
        $date=date("Y/m/d");
        $ss=$_POST['idp'];
        $db = new mysqli('localhost', 'root', '', 'pro');
        $sql="INSERT INTO bill (id, iduser, idproducts, date) VALUES (NULL ,'".$id."','".$ss."','".$date."');";
        $rs = $db->query($sql);
        $db->commit();
        $db->close();
        ?>
        <script type="text/javascript">
            alert("Purchase completed");
        </script>
    <?php

    }
    else {


    ?>
        <script type="text/javascript">
            alert("Login First");
        </script>
        <?php

    }
}
?>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
<script src="node_modules/jquery/jquery.slim.min.map"></script>
</body>
</html>
