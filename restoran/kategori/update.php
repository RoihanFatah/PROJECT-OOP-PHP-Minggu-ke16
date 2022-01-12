<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tblkategori WHERE idkategori=$id";

        $row = $db->getITEM($sql);
    }

?>

<h3>UPDATE KATEGORI</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group mb-3 w-50">
            <label for="kategori">Nama Kategori :</label>
            <input type="text" name="kategori" required value="<?php echo $row['kategori']?>" autocomplete="off"  class="form-control">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>

<?php 

if (isset($_POST['simpan'])) {
    $kategori = $_POST['kategori'];

    $sql ="UPDATE tblkategori SET kategori='$kategori' WHERE idkategori=$id";

    
    
    $db->runSQL($sql);

    header("location:?f=kategori&m=select");
}

?>