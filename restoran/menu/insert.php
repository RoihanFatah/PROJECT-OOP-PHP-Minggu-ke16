<?php 

    $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");

?>


<h3>INSERT MENU</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3 w-50">
            <label for="menu">Kategori :</label>
            <select name="idkategori" id="">
                <?php foreach($row as $r):?>
                <option value="<?php echo $r['idkategori']?>"><?php echo $r['kategori']?></option>
                <?php endforeach?>
            </select>
        </div>
        <div class="form-group mb-3 w-50">
            <label for="menu">Nama Menu :</label>
            <input type="text" name="menu" required placeholder="isi menu" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="harga">Harga :</label>
            <input type="text" name="harga" number required placeholder="isi harga" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="gambar">Gambar :</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>

<?php 

if (isset($_POST['simpan'])) {
    $idkategori = $_POST['idkategori'];
    $menu = $_POST['menu'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $temp = $_FILES['gambar']['tmp_name'];

    if (empty($gambar)) {
        echo "<h3>MASUKKAN GAMBAR</h3>";
    } else {
        $sql ="INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga)";
        move_uploaded_file($temp,'../upload/'.$gambar);

        $db->runSQL($sql);

        header("location:?f=menu&m=select");

    }



}

?>