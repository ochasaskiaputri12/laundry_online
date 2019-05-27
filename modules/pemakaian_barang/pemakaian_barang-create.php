<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pemakaian_barang-create?">Home</a></li>
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
<?php
  $db = new Database();
  $db->selectMax('pemakaian_barang','id');
  $res = $db->getResult();
  $kode = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
  $value = 'PB000'.$kode;
  echo "<input type='text' name='kode' value='$value' placeholder='kode' readonly>";
?>
</div>
</div>
  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">jumlah</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="jumlah" placeholder="jumlah" required>
    </div>
  </div>
  <!-- field barang -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="barang_id" class="text-right middle">Barang</label>
    </div>
    <div class="small-6 cell">
      <select name="barang_id">
      <option value = ""> Pilih Barang </option>
      <?php
        $db = new Database();
        $db->select('barang','id, nama');
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
      <label for="jumlah" class="text-right middle"></label>
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
  $jumlah = $_POST['jumlah'];
  $barang_id = $_POST['barang_id'];
  $karyawan_id = $_POST['karyawan_id'];
  
  $db=new Database();
  $db->insert('pemakaian_barang',
  array(
    'kode'=>$kode,
    'jumlah'=>$jumlah,
    'barang_id'=>$barang_id,
    'karyawan_id'=>$karyawan_id
  ));
  $res=$db->getResult();
  // print_r($res);
  // redirect to list
  header('Location: /laundry_online/index.php?module=pemakaian_barang');
}
?>