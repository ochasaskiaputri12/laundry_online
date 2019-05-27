<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian-create?">Home</a></li>
  <li class="disabled">Data Pemakaian tarif</li>
</ul>
</nav>
<form action="" method="post">
  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">jumlah</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="jumlah" placeholder="jumlah" required>
    </div>
    <div>
      kg
    </div>
  </div>
  <!-- field tarif -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tarif_id" class="text-right middle">Nama Pakaian</label>
    </div>
    <div class="small-6 cell">
      <select name="tarif_id">
      <option value = ""> Pilih nama Pakaian </option>
      <?php
        $db = new Database();
        $db->select('tarif','id, nama');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[nama]</option>";
        }    
      ?>
      </select>
    </div>
  </div>
  <!-- field jenis_laundry -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jenis_laundry_id" class="text-right middle">nama jenis laundry</label>
    </div>
    <div class="small-6 cell">
    <select name="jenis_laundry_id">
    <option value = ""> Pilih jenis laundry </option>
      <?php
        $db = new Database();
        $db->select('jenis_laundry','id, nama');
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
  $jumlah = $_POST['jumlah'];
  $tarif_id = $_POST['tarif_id'];
  $jenis_laundry_id = $_POST['jenis_laundry_id'];
  
  $db=new Database();
  $db->insert('rincian',
  array(
    'jumlah'=>$jumlah,
    'tarif_id'=>$tarif_id,
    'jenis_laundry_id'=>$jenis_laundry_id
  ));
  $res=$db->getResult();
  // print_r($res);
  // redirect to list
  header('Location: /laundry_online/index.php?module=rincian');
}
?>