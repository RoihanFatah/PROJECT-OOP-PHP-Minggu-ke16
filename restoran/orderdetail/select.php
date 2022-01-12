<h3>Detail Pembelian</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group mb-3 w-50">
            <label for="kategori">Tanggal Awal :</label>
            <input type="date" name="tawal" required autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="kategori">Tanggal Akhir :</label>
            <input type="date" name="takhir" required autocomplete="off"  class="form-control">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" name="simpan" value="Cari">
        </div>
    </form>
</div>

<?php


    $jumlahdata = $db->rowCOUNT("SELECT idorderdetail FROM vorderdetail ");

    $banyak = 4;

    $halaman = ceil ($jumlahdata / $banyak);

    if (isset ($_GET ['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    } else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM vorderdetail ORDER BY idorderdetail DESC LIMIT $mulai,$banyak";

    if (isset($_POST['simpan'])) {
        $tawal = $_POST['tawal'];
        $takhir = $_POST['takhir'];
        $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$tawal' AND '$takhir'";
    }

    $row = $db->getALL($sql);

    $no = 1+$mulai;
    $total = 0;



?>


<table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>No.</th>
            <th>Pelanggan</th>
            <th>Tanggal Order</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Alamat</th>
            <!-- <th>Nominal Pembayaran</th>
            <th>Kembali</th>
            <th>Status Pembayaran</th> -->
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)) {?>
        <?php foreach ($row as $r):?>

            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $r['pelanggan']?></td>
                <td><?php echo $r['tglorder']?></td>
                <td><?php echo $r['menu']?></td>
                <td><?php echo $r['harga']?></td>
                <td><?php echo $r['jumlah']?></td>
                <td><?php echo $r['jumlah'] * $r['harga']?></td>
                <td><?php echo $r['alamat']?></td>

                <?php 
                
                    $total = $total + ($r['jumlah'] * $r['harga']);

                ?>

            </tr>
        <?php endforeach?>
        <?php }?>

        <tr>
            <td colspan="6"><h4>Grand Total</h4></td>
            <td><h3>Rp. <?php echo $total?></h3></td>
        </tr>
    </tbody>
</table>

<?php 

for ($i=1; $i <=$halaman ; $i++) { 
    echo '<a href="?f=orderdetail&m=select&p='.$i.'">'. $i. '</a>';
    echo '&nbsp &nbsp &nbsp';
}

?>
