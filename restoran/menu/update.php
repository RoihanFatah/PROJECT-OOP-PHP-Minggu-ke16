<?php 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

    $item = $db->getITEM($sql);

    $idkategori = $item['idkategori'];

   


}

    $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");

?>




<h3>INSERT MENU</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3 w-50">
            <label for="menu">Kategori :</label>
            <select name="idkategori" id="">
                <?php foreach($row as $r):?>
                <option <?php if($idkategori == $r['idkategori']) echo "Selected"?> value="<?php echo $r['idkategori']?>" ><?php echo $r['kategori']?></option>
                <?php endforeach?>
            </select>
        </div>
        <div class="form-group mb-3 w-50">
            <label for="menu">Nama Menu :</label>
            <input type="text" name="menu" required value="<?php echo $item['menu']?>" autocomplete="off"  class="form-control">
        </div>
        <div class="form-group mb-3 w-50">
            <label for="harga">Harga :</label>
            <input type="text" name="harga" number required value="<?php echo $item['harga']?>" autocomplete="off"  class="form-control">
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
    $gambar = $item['gambar'];
    $temp = $_FILES['gambar']['tmp_name'];

    if (!empty($temp)) {
        $gambar = $_FILES['gambar']['name'];

        move_uploaded_file($temp,'../upload/'.$gambar);
    }

    $sql = "UPDATE tblmenu SET idkategori=$idkategori, menu='$menu', 
            gambar='$gambar', harga=$harga WHERE idmenu=$id";

    $db->runSQL($sql);

    header("location:?f=menu&m=select");



}

?>