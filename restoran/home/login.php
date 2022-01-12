<div class="row">
    <div class="col-4 mx-auto mt-5">
        <div class="form-group">
            <form action="" method="post">
                <div>
                    <h2>LOGIN PELANGGAN</h2>
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

<?php 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1 ";

    $count = $db->rowCOUNT($sql);

    if ($count == 0) {
        echo "<center><h3>LOGIN GAGAL</h3></center>";
    } else {
        $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1 ";
        $row = $db->getITEM($sql);

        $_SESSION['pelanggan']=$row['email'];
        $_SESSION['idpelanggan']=$row['idpelanggan'];

        header("location:index.php");
    }

    
}

?>