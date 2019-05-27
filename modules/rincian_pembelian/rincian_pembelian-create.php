<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian_pembelian-create?">Home</a></li>
  <li class="disabled">Data Rincian Transaksi</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field nomer -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="nomer" class="text-right middle">nomer</label>
</div>
<div class="small-6 cell">
<?php
  $db = new Database();
  $db->selectMax('pembelian','id');
  $res = $db->getResult();
  $nomer = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
  $value = 'N000'.$nomer;
  echo "<input type='text' name='nomer' value='$value' placeholder='nomer' readonly>";
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
  <!-- field pembelian -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pembelian_id" class="text-right middle">pembelian</label>
    </div>
    <div class="small-6 cell">
    <select name="pembelian_id">
    <option value = ""> Pilih Pembelian </option>
      <?php
        $db = new Database();
        $db->select('pembelian','id, tanggal');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[tanggal]</option>";
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
  $nomer = $_POST['nomer'];
  $jumlah = $_POST['jumlah'];
  $barang_id = $_POST['barang_id'];
  $pembelian_id = $_POST['pembelian_id'];
  
  $db=new Database();
  $db->insert('rincian_pembelian',
  array(
    'nomer'=>$nomer,
    'jumlah'=>$jumlah,
    'barang_id'=>$barang_id,
    'pembelian_id'=>$pembelian_id
  ));
  $res=$db->getResult();
  // print_r($res);
  // redirect to list
  header('Location: /laundry_online/index.php?module=rincian_pembelian');
}
?>