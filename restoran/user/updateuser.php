<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbluser WHERE iduser=$id";
        $row = $db->getITEM($sql);

    }

?>

<h3>UPDATE USER</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group mb-3 w-50">
            <label for="user">Nama User :</label>
            <input type="text" name="user" required value="<?php echo $row['user']?>" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="email">E-Mail :</label>
            <input type="email" name="email" required value="<?php echo $row['email']?>" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="password">Password :</label>
            <input type="password" name="password" required value="<?php echo $row['password']?>" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="password">Konfirmasi Password :</label>
            <input type="password" name="konfirmasi" required value="<?php echo $row['password']?>" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="password">Level :</label>
            <select name="level" id="">
                <option value="admin" <?php if($row['level']==="admin") echo "selected"?>>Admin</option>
                <option value="koki" <?php if($row['level']==="koki") echo "selected"?>>Koki</option>
                <option value="kasir" <?php if($row['level']==="kasir") echo "selected"?>>Kasir</option>
            </select>
        </div>
        <div>
            <input class="btn btn-primary" type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>

<?php 

if (isset($_POST['simpan'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];
    $level = $_POST['level'];

    if ($password === $konfirmasi) {
        $sql ="UPDATE tbluser SET user='$user', email='$email', password='$password', level='$level' WHERE iduser=$id";

        
    
        $db->runSQL($sql);

        header("location:?f=user&m=select");

    } else {
        echo "<h3>KONFIRMASI GAGAL</h3>";
    }

}

?>