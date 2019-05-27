<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
  <li><a href="?module=home">Home</a></li>
  <li><a href="?module=karyawan">Karyawan</a></li>
  <li class="disabled">Create Data Karyawan</li>
</ul>
</nav>
<form action="" method="post">

<!-- field NIK -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nik" class="text-right middle">NIK</label>
  </div>
  <div class="small-6 cell">
  <?php
    $db = new Database();
    $db->selectMax('karyawan','id');
    $res = $db->getResult();
    $nik = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
    $value = 'KR000'.$nik;
    echo "<input type='text' name='nik' value='$value' placeholder='NIK' readonly>";
  ?>
  </div>
</div>

<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama Karyawan</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama Karyawan" required>
  </div>
</div>
<!-- field alamat -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="alamat" class="text-right middle">Alamat Karyawan</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="alamat" placeholder="Alamat Karyawan" required>
  </div>
</div>
<!-- field telp -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="telp" class="text-right middle">No Telepon</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="telp" placeholder="No Telepon" required>
  </div>
</div>
<!-- field gender -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="gender" class="text-right middle">Gender</label>
    </div>
    <div class="small-6 cell">    
      <input type="radio" name="gender" value="L" placeholder="Gender" required>L
      <input type="radio" name="gender" value="P" placeholder="Gender" required>P
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
$id = $_POST['id'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$gender = $_POST['gender'];
  $db=new Database();
  $db->insert('karyawan',array('id'=>$id, 'nik'=>$nik, 'nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp,'gender'=>$gender));
  $res=$db->getResult();
  // redirect to list
  header('Location: /laundry_online/index.php?module=karyawan');
}
?>