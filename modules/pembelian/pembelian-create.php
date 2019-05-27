<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pembelian-create?">Home</a></li>
  <li class="disabled">Data Pembelian</li>
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
  $value = 'NO000'.$nomer;
  echo "<input type='text' name='nomer' value='$value' placeholder='nomer' readonly>";
?>
</div>
</div>
  <!-- field tanggal -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal" class="text-right middle">tanggal</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tanggal" placeholder="tanggal" required>
    </div>
  </div>
  <!-- field total -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="total" class="text-right middle">total</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="total" placeholder="total" required>
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
  <!-- field supplier -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="supplier_id" class="text-right middle">supplier</label>
    </div>
    <div class="small-6 cell">
      <select name="supplier_id">
      <option value = ""> Pilih Supplier </option>
      <?php
        $db = new Database();
        $db->select('supplier','id, nama');
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
  $tanggal = $_POST['tanggal'];
  $total = $_POST['total'];
  $karyawan_id = $_POST['karyawan_id'];
  $supplier_id = $_POST['supplier_id'];
  
  $db=new Database();
  $db->insert('pembelian',
  array(
    'nomer'=>$nomer,
    'tanggal'=>$tanggal,
    'total'=>$total,
    'karyawan_id'=>$karyawan_id,
    'supplier_id'=>$supplier_id
  ));
  $res=$db->getResult();
  // print_r($res);
  // redirect to list
  header('Location: /laundry_online/index.php?module=pembelian');
}
?>
