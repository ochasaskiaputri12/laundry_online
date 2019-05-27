<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=tarif-create?">Home</a></li>
  <li class="disabled">Data Tarif jenis_laundry</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="nama" required>
    </div>
  </div>
  <!-- field harga -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="harga" class="text-right middle">harga</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="harga" placeholder="harga" required>
    </div>
  </div>
  <!-- field jenis_laundry -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jenis_laundry_id" class="text-right middle">jenis laundry</label>
    </div>
    <div class="small-6 cell">
      <select name="jenis_laundry_id">
      <option value = ""> Pilih Jenis Laundry </option>
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
      <label for="harga" class="text-right middle"></label>
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
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $jenis_laundry_id = $_POST['jenis_laundry_id'];
  
  $db=new Database();
  $db->insert('tarif',
  array(
    'nama'=>$nama,
    'harga'=>$harga,
    'jenis_laundry_id'=>$jenis_laundry_id,
  ));
  $res=$db->getResult();
  // print_r($res);
  // redirect to list
  header('Location: /laundry_online/index.php?module=tarif');
}
?>