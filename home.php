<?php
session_start();
$_SESSION['home']=1;
?>
<?php

?>
<!doctype html>
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
    <title>Home</title>

</head>
<body>
<?php
include "hed.php";
?>
<section style="background-image: url('image/main.jpg')" class="main">
    <div  class="container write">
        <h2 class="row">We are not the only ones</h2>
        <h3 class="row">but we are the best</h3>
    </div>
</section>
<section id="offers" class="Offers">
    <div class="t "  >
        <h2 >Offers</h2>
    </div>
    <div class="container">

        <div class="container">
            <div  style="padding: 10px" class="col">


                <div style="padding: 10px ;" class="col ad">
                    <?php
                    $db=new mysqli('localhost','root','','pro');
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }else {
                        $sql = "SELECT * FROM products WHERE `department`='Offers' ORDER by `idproducts` DESC";


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
                            <div class="card as  "   style="min-width: 300px;margin-left: 10px;}">
                                <img  class="card-img-top" style="width: 300px;height: 300px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>"/>
                                <div class="card-body  " onmouseover="this.style.backgroundColor ='blueviolet'" onmouseleave="this.style.backgroundColor ='white'" >

                                    <h5 class="card-title"><?php echo $price.'$'?></h5>
                                    <h6 class="card-title"><?php echo $size?></h6>
                                    <p class="card-text"><?php echo $disc?></p>

                                    <form method="post" action="home.php">
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
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></>
<script src="node_modules/jquery/jquery.slim.min.map"></>
</body>
</html>
