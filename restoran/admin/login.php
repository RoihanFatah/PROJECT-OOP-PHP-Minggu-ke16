<?php 

session_start();

require_once "../dbController.php";
$db = new DB;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restoran</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-5">
                <div class="form-group">
                    <form action="" method="post">
                        <div>
                            <h2>LOGIN RESTORAN</h2>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">E-Mail :</label>
                            <input type="email" name="email" required autocomplete="off"  class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password :</label>
                            <input type="password" name="password" required autocomplete="off"  class="form-control">
                        </div>
                        <div>
                            <input class="btn btn-primary" type="submit" name="login" value="login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<?php 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password' ";

    $count = $db->rowCOUNT($sql);

    if ($count == 0) {
        echo "<center><h3>LOGIN GAGAL</h3></center>";
    } else {
        $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password' ";
        $row = $db->getITEM($sql);

        $_SESSION['user']=$row['email'];
        $_SESSION['level']=$row['level'];
        $_SESSION['iduser']=$row['iduser'];

        header("location:index.php");
    }

    
}

?>