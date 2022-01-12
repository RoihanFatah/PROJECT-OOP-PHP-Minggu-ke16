<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tblorder WHERE idorder=$id";

        $row = $db->getITEM($sql);

    }

?>

<h3>PEMBAYARAN</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group mb-3 w-50">
            <label for="kategori">Tagihan :</label>
            <input type="number" name="total" required value="<?php echo $row['total']?>" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="kategori">Nominal Pembayaran :</label>
            <input type="number" name="bayar" required autocomplete="off"  class="form-control">
        </div>
        <div>
            <input class="btn btn-warning" type="submit" name="simpan" value="Bayar">
        </div>
    </form>
</div>

<?php 

if (isset($_POST['simpan'])) {
    $bayar = $_POST['bayar'];
    $kembali = $bayar - $row['total'];

    $sql ="UPDATE tblorder SET bayar=$bayar, kembali=$kembali, status=1 WHERE idorder=$id";

    if ($kembali < 0) {
        echo "<h3>NOMINAL KURANG</h3>";
    } else {
        $db->runSQL($sql);

        header("location:?f=order&m=select");
    }


}

?>