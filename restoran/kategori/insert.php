<h3>INSERT KATEGORI</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group mb-3 w-50">
            <label for="kategori">Nama Kategori :</label>
            <input type="text" name="kategori" required placeholder="isi kategori" autocomplete="off"  class="form-control">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>

<?php 

if (isset($_POST['simpan'])) {
    $kategori = $_POST['kategori'];

    $sql ="INSERT INTO tblkategori VALUES ('','$kategori')";
    
    $db->runSQL($sql);

    header("location:?f=kategori&m=select");
}

?>