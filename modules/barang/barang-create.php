<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=barang-create?">Home</a></li>
  <li class="disabled">Data Barang</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field kode -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="kode" class="text-right middle">Kode</label>
</div>
<div class="small-6 cell">
<?php
  $db = new Database();
  $db->selectMax('barang','id');
  $res = $db->getResult();
  $kode = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
  $value = 'B000'.$kode;
  echo "<input type='text' name='kode' value='$value' placeholder='kode' readonly>";
?>
</div>
</div>
  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama" required>
    </div>
  </div>
  <!-- field stok -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="stok" class="text-right middle">stok</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="stok" placeholder="stok" required>
    </div>
  </div>
  <!-- field tanggal_update_stok -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal_update_stok" class="text-right middle">Tanggal Update Stok</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tanggal_update_stok" placeholder="Tanggal Update Stok" required>
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

// check action submit
if(isset($_POST['submit'])){
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $stok = $_POST['stok'];
  $tanggal_update_stok = $_POST['tanggal_update_stok'];
  
  $db=new Database();
  $db->insert('barang',array('kode'=>$kode, 'nama'=>$nama, 'stok'=>$stok, 'tanggal_update_stok'=>$tanggal_update_stok));
  $res=$db->getResult();
  // redirect to list
  header('Location: /laundry_online/index.php?module=barang');
}
?>