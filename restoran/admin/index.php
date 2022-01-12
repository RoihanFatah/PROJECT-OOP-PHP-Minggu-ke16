<?php 

    session_start();

    require_once "../dbController.php";
    $db = new DB;

    if (!isset($_SESSION['user'])) {
        header("location:login.php");
    }

    if (isset($_GET['log'])) {
        session_destroy();
        header("location:index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page | Restoran App</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="navbar navbar-dark bg-dark p-2">
        <div class="col-md-3">
            <a href="index.php" class="text-decoration-none text-light"><h1>Admin Page</h1></a>
        </div>
        <div class="col-md-9">
            <div class="float-end me-4"><a href="?log=logout" class="text-decoration-none">Logout</a></div>
            <div class="float-end me-4 text-light"><a href="?f=user&m=updateuser&id=<?php echo $_SESSION['iduser']?>"><?php echo $_SESSION['user']?></a></div>
            <div class="float-end me-4 text-light">Acces Level : <?php echo $_SESSION['level']?></div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-md-3 ">
                <ul class="nav flex-column ">

                <?php 
                
                    $level = $_SESSION['level'];
                    switch ($level) {
                        case 'admin':
                            echo '
                            
                            <li class="nav-item"><a class="nav-link active" href="?f=kategori&m=select">Kategori</a></li>
                            <li class="nav-item"><a class="nav-link active" href="?f=menu&m=select">Menu</a></li>
                            <li class="nav-item"><a class="nav-link active" href="?f=pelanggan&m=select">Pelanggan</a></li>
                            <li class="nav-item"><a class="nav-link active" href="?f=order&m=select">Order</a></li>
                            <li class="nav-item"><a class="nav-link active" href="?f=orderdetail&m=select">Order Detail</a></li>
                            <li class="nav-item"><a class="nav-link active" href="?f=user&m=select">User</a></li>
                            
                            ';
                        break;
                        case 'kasir':
                            echo '
                            
                            <li class="nav-item"><a class="nav-link active" href="?f=order&m=select">Order</a></li>
                            <li class="nav-item"><a class="nav-link active" href="?f=orderdetail&m=select">Order Detail</a></li>
                            
                            ';
                        break;
                        case 'koki':
                            echo '
                            
                            <li class="nav-item"><a class="nav-link active" href="?f=orderdetail&m=select">Order Detail</a></li>
                            
                            ';
                        break;
                        default:
                            echo 'TIDAK ADA MENU';
                            break;
                    }
                
                ?>

                    
                </ul>
            </div>

            <div class="col-md-9">
                <?php 
                
                    if (isset($_GET['f']) && isset($_GET['m'])) {
                        $f = $_GET['f'];
                        $m = $_GET['m'];

                        $file = '../'.$f.'/'.$m.'.php';

                        require_once $file;
                    }
                
                ?>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <p class="text-center">2021-Copyright@roihan</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>