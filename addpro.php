<?php
session_start();
if(isset($_SESSION['home'])){
    if($_SESSION['level']==1){

    }
    else{
        header("location:home.php");
    }
}


if(isset($_POST['addp']))
{
    if(!empty($_POST['pname']) && !empty($_POST['pdis']) && !empty($_POST['pdep']) && !empty($_POST['ptype']) && !empty($_POST['pprice']) &&!empty($_POST['psize']) )
    {
        $name=$_POST['pname'];
        $pdis=$_POST['pdis'];
        $pdep=$_POST['pdep'];
        $ptype=$_POST['ptype'];
        $pprice=$_POST['pprice'];
        $psize=$_POST['psize'];


        if(!empty($_FILES['image']['name'])){
            $filename = $_FILES["image"]['name'];
            $fileType = pathinfo($filename, PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType, $allowTypes)) {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));
                try {

                    $db = new mysqli('localhost', 'root', '', 'pro');
                    $qrystrr = "INSERT INTO products (idproducts, department, type, price, description, size, img) VALUES (NULL, '" . $pdep . "', '" . $ptype . "', '" . $pprice . "', '" . $pdis . "', '" . $psize . "', '" . $imgContent . "');";
                    $rs = $db->query($qrystrr);
                    $db->commit();
                    $db->close();
                    if ($rs == 1) {

                        header("location:home.php");
                    }

                } catch (exception $e) {

                }


            }}else{
            ?>
            <script type="text/javascript">
                alert("Choose a photo");
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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../fest/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="../fest/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="../fest/stayle/homecss.css" rel="stylesheet">
    <script src="../fest/node_modules/jquery/dist/jquery.min.js" ></script>
    <script src="../fest/script/homescript.js" ></script>
</head>
<body style="background-image:url('image/login2.jpg ')">
<?php
include 'hed.php'
?>
<section  class="vh-100"  >
    <div class="container py-5" >
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-8" >
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">

                        <div class="col-md-6 col-lg-10 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-4 text-black">

                                <form action="addpro.php" method="post" enctype="multipart/form-data">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h2 fw-bold mb-0">Add Product:</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Fill the data:</h5>

                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="pname" name="pname" class="form-control form-control-lg" />
                                            <label class="form-label" for="pname">User Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa-light fa-prescription fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <textarea id="pdis" name="pdis" rows="4" cols="50" class="form-control form-control-lg"></textarea>
                                            <label class="form-label" for="pdis">Discription</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa-solid fa-shirt fa-lg me-3 fa-fw"></i>
                                        <label class="form-label" >Department:</label>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="radio" id="pdep" name="pdep" value="Men">
                                            <label for="Men">Men</label><br>
                                            <input type="radio" id="pdep" name="pdep" value="Women">
                                            <label for="css">Women</label><br>
                                            <input type="radio" id="pdep" name="pdep" value="Children">
                                            <label for="children">Children</label>
                                            <input type="radio" id="pdep" name="pdep" value="Offers">
                                            <label for="Offers">Offers</label>

                                        </div>

                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <i class="fa-light fa-vest fa-lg me-3 fa-fw" ></i>
                                            <label class="form-label" >Type:</label>
                                            <select name="ptype" id="ptype">
                                                <option value="Pants">Pants</option>
                                                <option value="Shirts">Shirts</option>
                                                <option value="Dresses">Dresses</option>
                                                <option value="Shorts">Shorts</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa-solid fa-dollar-sign fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="pprice" name="pprice" class="form-control form-control-lg" />
                                            <label class="form-label" for="pprice">Price</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa-solid fa-signal fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="psize">prod_size:</label>
                                            <select name="psize" id="psize">
                                                <option value="XXL">XXL</option>
                                                <option value="XL">XL</option>
                                                <option value="L">L</option>
                                                <option value="M">M</option>
                                                <option value="S">S</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa-solid fa-images fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="pimg">prod_image:</label>
                                            <input type="file" accept="image/*" name="image" id="file"  >

                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button name="addp"  id="addp" class="btn btn-primary btn-lg" type="submit">Add</button>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>