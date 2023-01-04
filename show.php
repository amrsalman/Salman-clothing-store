<?php
session_start();
if(isset($_SESSION['home'])){
    if(isset($_SESSION['iduser'])){
        if($_SESSION['level']==1){
            $_SESSION['login']=1;
        }
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
<body style="background-image:url('image/login2.jpg ')">
<?php
include "hed.php";
?>
<section  class="vh-100"  >
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">P-id</th>
            <th scope="col">P-dep</th>
            <th scope="col">P-type</th>
            <th scope="col">P-disc</th>
            <th scope="col">P-price</th>

            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $db=new mysqli('localhost','root','','pro');
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }else {
            $sql = "SELECT * FROM products ORDER by `idproducts` DESC";


            $res = mysqli_query($db,$sql);
        }
        if ($res) {
            // output data of each row
            $id=1;
            while($row =mysqli_fetch_assoc($res)) {
                /*  echo "id: " . $row["idproduct"]. " - Name: " . $row["department"]. " " . $row["department"]. "<br>";*/
                $sed=$row['idproducts'];
                $dep=$row['department'];
                $type=$row['type'];
                $disc=$row['description'];
                $price=$row['price'];


                ?>
                 <tr>
            <th scope="row"><?php echo $sed?></th>
            <td><?php echo $dep ?></td>
            <td><?php echo$type?></td>
            <td><?php echo$disc?></td>
            <td><?php echo$price?></td>
            <form method="post" action="show.php" >
                <td>
                    <input type="text" id="deli" name="deli" style="display: none" value="<?php echo $sed;?>">
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button  name="delete" id="delete" class="btn btn-danger btn-lg" href="" type="submit">Delete</button>
                    </div>



                </td>
            </form>
        </tr>
                <?php

                $id++;
            }
        }
        else {
            echo "0 results";
        }
        ?>


        </tbody>
    </table>
</section>

<?php

if(isset($_POST['delete'])){
    $v=$_POST['deli'];

    $db=new mysqli('localhost','root','','pro');
    $sql="DELETE FROM `products` WHERE `idproducts`='".$v."'";
    $res = $db->query($sql);
    $db->commit();
    $db->close();
    if($res==1)
    {
        header("location:show.php");
        // Close connection
        ?>
        <script type="text/javascript">
            alert("deleted succesfuly");
        </script>
    <?php
         // redirects to all records page

    }
    else{
        ?>
        <script type="text/javascript">
            alert("not deleted");
        </script>
        <?php

    }

}
?>
</body>
</html>


