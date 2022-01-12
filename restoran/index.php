<?php

    session_start();
    require_once "dbcontroller.php";
    $db = new DB;

    $sql = "SELECT * FROM tblkategori ORDER BY kategori";
    $row = $db->getALL($sql);

    if (isset($_GET['log'])) {
        session_destroy();
        header("location:index.php");
    }

    function cart(){
        global $db;

        $cart = 0;


        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<>'idpelanggan' && $key<>'user' && $key<>'level' && $key<>'iduser') {
                $id = substr($key,1);

                $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";
                
                $row = $db->getALL($sql);

                foreach ($row as $r) {
                    $cart++;
                }

            }
        }

        return $cart;
    }

    

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device=width,initial-scale-1.o">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Roi's Restaurant | Restaurant App</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-md-3 mt-4">
                    <h2><a href="index.php" class="text-decoration-none">Roi's Restaurant</a></h2>
                </div>

                <div class="col-md-9">

                    <?php 
                    
                        if (isset($_SESSION['pelanggan'])) {
                            echo '
                            <div class="float-end me-4 mt-4"><a href="?f=home&m=history" type="button" class="btn btn-outline-primary ms-4">History  </a></div>
                                <div class="float-end mt-4"><a href="?log=logout" type="button" class="btn btn-outline-danger">logout</a></div>
                                <div class="float-end me-4 mt-4">Pelanggan :  '.$_SESSION['pelanggan'].'</div>
                                <div class="float-end me-4 mt-4">Total Order : ( <a href="?f=home&m=beli" class="text-decoration-none"> '.cart().'</a> ) </div>
                            ';
                        } else {
                            echo '
                                <div class="float-end me-4 mt-4"><a href="?f=home&m=login" type="button" class="btn btn-outline-primary">login</a></div>
                                <div class="float-end me-4 mt-4"><a href="?f=home&m=daftar" type="button" class="btn btn-outline-primary">Daftar</a></div>
                            ';
                        }
                    
                    ?>

                    
                    
                    
                    
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-md-3">
                    <h3>Kategori</h3>
                    <hr>

                    <?php if (!empty($row)) { ?>
                    <ul class="nav flex-column">

                    <?php foreach ($row as $r): ?>
                        <li class="nav-item"><a class="nav-link" href="?f=home&m=produk&id=<?php echo $r['idkategori'] ?>"><?php echo $r['kategori'] ?></a></li>
                    <?php endforeach ?> 

                    </ul>
                    <?php } ?>
                </div>

                <div class="col-md-9">
                    <?php
                        if (isset($_GET['f']) && isset($_GET['m'])) {
                            $f = $_GET['f'];
                            $m = $_GET['m'];

                            $file = $f . '/' . $m . '.php';

                            require_once $file;
                        }
                        else{
                            require_once "home/produk.php";
                        }

                    ?>
                </div>
            </div>

            <footer class="bg-light text-center text-lg-start" style="margin-top: 9rem">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2022 Copyright:
                    <a class="text-dark text-decoration-none" href="#">roihanfatah.com</a>
                </div>
                <!-- Copyright -->
                </footer>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </div>

    </body>
</html>