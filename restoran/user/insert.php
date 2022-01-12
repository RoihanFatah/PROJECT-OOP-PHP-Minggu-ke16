<h3>INSERT USER</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group mb-3 w-50">
            <label for="user">Nama User :</label>
            <input type="text" name="user" required placeholder="isi user" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="email">E-Mail :</label>
            <input type="email" name="email" required placeholder="email" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="password">Password :</label>
            <input type="password" name="password" required placeholder="password" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="password">Konfirmasi Password :</label>
            <input type="password" name="konfirmasi" required placeholder="password" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="password">Level :</label>
            <select name="level" id="">
                <option value="admin">Admin</option>
                <option value="koki">Koki</option>
                <option value="kasir">Kasir</option>
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
    $password = hash('sha256', $_POST['password']);
    $konfirmasi = hash('sha256', $_POST['konfirmasi']);
    $level = $_POST['level'];

    if ($password === $konfirmasi) {
        $sql ="INSERT INTO tbluser VALUES ('','$user', '$email', '$password', '$level', 1)";
    
        
        $db->runSQL($sql);

        header("location:?f=user&m=select");

    } else {
        echo "<h3>KONFIRMASI GAGAL</h3>";
    }

}

?>