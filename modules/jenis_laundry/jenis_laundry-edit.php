<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('jenis_laundry','*','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=jenis_laundry-edit?">Home</a></li>
  <li class="disabled">Data Edit jenis_laundry</li>
</ul>
</nav>
<form action="" method="post">
<!-- field kode -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode" class="text-right middle">kode</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="kode" placeholder="kode" value="<?php echo $r['kode']; ?>" required>
    </div>
  </div>
  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
    <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="nama" placeholder="Nama" value="<?php echo $r['nama']; ?>" required>
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
  $nama = $_POST['nama'];
  $db = new Database();
  $db->update('jenis_laundry',array(
    'kode'=>$kode,
    'nama'=>$nama,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  // print_r($res);
  header('Location: /laundry_online/index.php?module=jenis_laundry');
}

?>