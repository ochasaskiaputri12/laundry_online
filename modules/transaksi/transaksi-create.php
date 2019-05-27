<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=transaksi-create?">Home</a></li>
  <li class="disabled">Data transaksi</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field nomer -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="nomer" class="text-right middle">nomer</label>
</div>
<div class="small-6 cell">
      <input type="text" name="nomer" placeholder="nomer" required>
</div>
</div>
  <!-- field tanggal_transaksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal_transaksi" class="text-right middle">Tanggal Transaksi</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tanggal_transaksi" placeholder="tanggal_transaksi" required>
    </div>
  </div>
  <!-- field tanggal_ambil -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal_ambil" class="text-right middle">Tanggal Ambil</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tanggal_ambil" placeholder="tanggal_ambil" required>
    </div>
  </div>
  <!-- field diskon -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="diskon" class="text-right middle">diskon</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="diskon" placeholder="diskon" required>
    </div>
    <div>
      %
    </div>
  </div>
  <!-- field konsumen -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="konsumen_id" class="text-right middle">konsumen</label>
    </div>
    <div class="small-6 cell">
      <select name="konsumen_id">
      <option value = ""> Pilih nama konsumen </option>
      <?php
        $db = new Database();
        $db->select('konsumen','id, nama');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[nama]</option>";
        }    
      ?>
      </select>
    </div>
  </div>
  <!-- field karyawan -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="karyawan_id" class="text-right middle">Karyawan</label>
    </div>
    <div class="small-6 cell">
    <select name="karyawan_id">
    <option value = ""> Pilih Karyawan </option>
      <?php
        $db = new Database();
        $db->select('karyawan','id, nama');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[nama]</option>";
        }    
      ?>
      </select>
    </div>
  </div>
  
  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal" class="text-right middle"></label>
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
  $nomer = $_POST['nomer'];
  $tanggal_transaksi = $_POST['tanggal_transaksi'];
  $tanggal_ambil = $_POST['tanggal_ambil'];
  $diskon = $_POST['diskon'];
  $konsumen_id = $_POST['konsumen_id'];
  $karyawan_id = $_POST['karyawan_id'];
  
  $db=new Database();
  $db->insert('transaksi',
  array(
    'nomer'=>$nomer,
    'tanggal_transaksi'=>$tanggal_transaksi,
    'tanggal_ambil'=>$tanggal_ambil,
    'diskon'=>$diskon,
    'konsumen_id'=>$konsumen_id,
    'karyawan_id'=>$karyawan_id
  ));
  $res=$db->getResult();
  // print_r($res);
  // redirect to list
  header('Location: /laundry_online/index.php?module=transaksi');
}
?>
