<h3>REGISTRASI PELANGGAN</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group mb-3 w-50">
            <label for="user">Nama :</label>
            <input type="text" name="pelanggan" required placeholder="isi nama" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="user">Alamat :</label>
            <input type="text" name="alamat" required placeholder="isi alamat" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="user">No. Telp :</label>
            <input type="text" name="telp" required placeholder="isi no. telpon" autocomplete="off"  class="form-control">
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

        <div>
            <input class="btn btn-primary" type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>

<?php 

if (isset($_POST['simpan'])) {
    $pelanggan = $_POST['pelanggan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($password === $konfirmasi) {
        $sql ="INSERT INTO tblpelanggan VALUES ('','$pelanggan', '$alamat', '$telp', '$email', '$password', 1)";

        // echo $sql;
    
        $db->runSQL($sql);

        header("location:?f=home&m=info");

    } else {
        echo "<h3>KONFIRMASI GAGAL</h3>";
    }

}

?>