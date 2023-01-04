
<?php
session_start();
if(isset($_SESSION['home'])){
    if(isset($_SESSION['iduser'])){
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
    <style>
        body{margin-top:20px;
            color: #2e323c;
            background: #f5f6fa;
            position: relative;
            height: 100%;
        }
        .invoice-container {
            padding: 1rem;
        }
        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #2e323c;
        }
        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }
        .invoice-container .invoice-header address {
            font-size: 0.8rem;
            color: #9fa8b9;
            margin: 0;
        }
        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
            background: #f5f6fa;
        }
        .invoice-container .invoice-details .invoice-num {
            text-align: right;
            font-size: 0.8rem;
        }
        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }
        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #ffffff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }
        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #9fa8b9;
        }
        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }
        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #f5f6fa;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }
        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }


        .custom-table {
            border: 1px solid #e0e3ec;
        }
        .custom-table thead {
            background: #007ae1;
        }
        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }
        .custom-table > tbody tr:hover {
            background: #fafafa;
        }
        .custom-table > tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }
        .custom-table > tbody td {
            border: 1px solid #e6e9f0;
        }


        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .text-success {
            color: #00bb42 !important;
        }

        .text-muted {
            color: #9fa8b9 !important;
        }

        .custom-actions-btns {
            margin: auto;
            display: flex;
            justify-content: flex-end;
        }

        .custom-actions-btns .btn {
            margin: .3rem 0 .3rem .3rem;
        }</style>

</head>

<body style="background: #e0e3ec;)">
<?php
include "hed.php";
?>
<section  class="vh-100" style="padding-top: 70px" >
    <div class="container">
        <div style="padding: 10px" class="row gutters">
            <form method="post" action="bill.php">
                <div>
                    <label for="start" >Bill Date:</label>
                    <input type="date" name="dateFrom" value="<?php echo date('Y-m-d'); ?>" style="width: 18rem"  min="2022-01-01" max="2023-01-01">
                    <button  type="submit"  id="show" name="show" style="width: 18rem">Show</button>
                </div>
            </form>
        </div>

        <div class="row gutters">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
             <div class="card">
                 <div class="card-body p-0">
                     <div class="invoice-container">
                         <div class="invoice-header">

                                <div class="row gutters">

                                </div>

                            </div>
                            <div class="invoice-body">

                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table m-0">
                                                <thead>
                                                <tr>
                                                    <th>Items</th>
                                                    <th>Product ID</th>
                                                    <th>price</th>
                                                    <th>Size</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $c=0;
                                                if(isset($_POST['show'])){
                                                $db=new mysqli('localhost','root','','pro');
                                                if ($db->connect_error) {
                                                    die("Connection failed: " . $db->connect_error);
                                                }else {
                                                    $ddate=$_POST['dateFrom'];
                                                    $sql = "SELECT distinct * FROM `bill` WHERE `date`='".$ddate."'";
                                                    $res = mysqli_query($db,$sql);
                                                }
                                                if ($res) {
                                                    // output data of each row

                                                    while($row =mysqli_fetch_assoc($res)) {
                                                        $id =$_SESSION['iduser'];
                                                        $sql = "SELECT distinct `idproducts` FROM `bill` WHERE `iduser`='".$id."'";


                                                        $res1 = mysqli_query($db, $sql);


                                                        if ($res1) {
                                                            while($rows =mysqli_fetch_assoc($res1)) {
                                                                $sed=$rows['idproducts'];
                                                                $sql ="SELECT distinct * FROM `products` WHERE `idproducts`='".$sed."'";
                                                                $res2 = mysqli_query($db, $sql);

                                                                if ($res2) {
                                                                    while ($rowss = mysqli_fetch_assoc($res2)) {
                                                                        $sed=$rowss['idproducts'];
                                                                        $dep=$rowss['department'];
                                                                        $type=$rowss['type'];
                                                                        $disc=$rowss['description'];
                                                                        $price=$rowss['price'];
                                                                        $s=$rowss['size'];
                                                                        $imgs=$rowss['img'];

                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <img  class="card-img-top" style="width: 12rem;height: 12rem" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imgs); ?>"/>
                                                                                <?php echo $disc ?>
                                                                            </td>
                                                                            <td><?php echo$sed?></td>
                                                                            <td><?php echo$price?></td>
                                                                            <td><?php echo$s?></td>
                                                                            </form>
                                                                        </tr>

                                                                        <?php
                                                                        $c=$c+$price;



                                                                    }

                                                                }
                                                            }
                                                            break;



                                                    // output data of each row


                                                }
                                                    }
                                                }
                                                else {

                                                }}
                                                ?>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td colspan="2">

                                                        <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                    </td>
                                                    <td>


                                                        <h5 class="text-success"><?php echo $c;?><strong></strong></h5>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="invoice-footer">
                                Thank you for your Business.
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