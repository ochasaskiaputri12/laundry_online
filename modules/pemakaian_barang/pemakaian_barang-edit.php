<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('pemakaian_barang','*','','',"id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pemakaian_barang-edit?">Home</a></li>
  <li class="disabled">Data Pemakaian Barang</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field kode -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode" class="text-right middle">Kode</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="kode" placeholder="kode" value="<?php echo $r['kode']; ?>" required>
    </div>
  </div>

  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">jumlah</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="jumlah" placeholder="jumlah" value="<?php echo $r['jumlah']; ?>" required>
    </div>
  </div>

  <!-- field barang_id -->
  <div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="barang_id" class="text-right middle">Barang </label>
  </div>
  <div class="small-6 cell">
      <select name="barang_id">
      <?php
        $db = new Database();
        $db->select('barang','id, nama');
        $barangs = $db->getResult();
        foreach ($barangs as &$barang){ 
          $selected =$r['barang_id'] == $barang['id'] ? 'selected' : '';
            echo "<option value=$barang[id]  $selected > $barang[nama] </option>";
        }?>
      </select>
</div>
</div>



  <!-- field karyawan_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="karyawan_id" class="text-right middle">Karyawan </label>
    </div>
    <div class="small-6 cell">
      <select name="karyawan_id">
      <?php
        $db = new Database();
        $db->select('karyawan','id, nama');
        $karyawans = $db->getResult();
        foreach ($karyawans as &$karyawan){ 
          $selected =$r['karyawan_id'] == $karyawan['id'] ? 'selected' : '';
            echo "<option value=$karyawan[id]  $selected > $karyawan[nama] </option>";
        }?>
      </select>
    </div>
  </div>
  
  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle"></label>
    </div>
    <div class="small-6 cell">
		<div class="small button-group">
  <button class="button" type="submit" name="submit">Simpan</button>
  <button class="button" type="reset">Reset</button>
  <a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
    </div>
  </div>
</form>
<?php 
   }
}
?>
<?php
// check action submit
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $kode = $_POST['kode'];
  $jumlah = $_POST['jumlah'];
  $barang_id = $_POST['barang_id'];
  $karyawan_id = $_POST['karyawan_id'];
  $db = new Database();
  $db->update('pemakaian_barang',array(
    'kode'=>$kode,
    'jumlah'=>$jumlah,
    'barang_id'=>$barang_id,
    'karyawan_id'=>$karyawan_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
//   print_r($res);
  header('Location: /laundry_online/index.php?module=pemakaian_barang');
}

?>