<?php
//session_start();
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="stayle/homecss.css" rel="stylesheet">

    <script src="node_modules/jquery/dist/jquery.min.js" ></script>
    <script src="script/homescript.js" ></script>

</head>
<body>
<header style="margin-bottom: 0em" class="head">

    <nav style="background-color: blueviolet !important;"  class="navbar navbar-expand-md  fixed-top navbar-dark bg-light">
        <div class="container-fluid  ">

            <div style="margin-right: 55%">
                <a  style="color: deeppink" class="navbar-brand" href="#">Salman</a>

            </div>

            <button ip="12" class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span   class="navbar-toggler-icon"></span>
            </button>
            <div >
                <div  class="collapse navbar-collapse   "  id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php"><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php#offers">Offers</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                departments
                            </a>
                            <ul style="background-color: darkorchid !important;" class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Men.php">Men</a></li>
                                <li><a class="dropdown-item" href="women.php">Women</a></li>
                                <li><a class="dropdown-item" href="children.php">Children</a></li>
                            </ul>
                        </li>

                            <?php
                            if(isset($_SESSION['level'])){
                                if($_SESSION['level']==1){
                                ?>

                        <li class="nav-item">
                               <a class="nav-link" href="addpro.php">AddProduct</a>
                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="show.php">Show&Delete</a>
                                    </li>

                            <?php

                            }}
                           ?>

                        <?php
                        if(isset($_SESSION['isuser'])){
                            if($_SESSION['level']==0){
                                ?>
                                <li class="nav-item">
                                        <a class="nav-link" href="bill.php"><i class="fa-solid fa-cart-shopping"></i></a>
                                    </li>
                                <?php
                            }
                        }

                        ?>


                        <li class="nav-item ">
                            <?php
                            if(isset($_SESSION['isuser'])){
                                if($_SESSION['isuser']==1){
                                    ?>
                                    <a class="nav-link" href="logout.php">log out</a>
                                    <?php
                                }
                            }

                            else{
                            ?>
                                <a class="nav-link" href="login.php">login</a>
                            <?php
                            }
                            ?>
                        </li>

                             <?php
                            if(!isset($_SESSION['isuser'])){

                                    ?>
                                   <li class="nav-item">
                                    <a class="nav-link" href="singup.php">sing up</a>
                                   </li>
                            <?php

                            }


                            ?>


                    </ul>

                </div>
            </div>

        </div>
    </nav>
</header>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
<script src="node_modules/jquery/jquery.slim.min.map"></script>
</body>
</html>