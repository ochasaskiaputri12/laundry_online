<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('pembelian','*','','',"id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pembelian-edit?">Home</a></li>
  <li class="disabled">Data Pemakaian supplier</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field nomer -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nomer" class="text-right middle">nomer</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="nomer" placeholder="nomer" value="<?php echo $r['nomer']; ?>" required>
    </div>
  </div>

  <!-- field total -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="total" class="text-right middle">total</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="total" placeholder="total" value="<?php echo $r['total']; ?>" required>
    </div>
  </div>

  <!-- field tanggal -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal" class="text-right middle">tanggal</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="date" name="tanggal" placeholder="tanggal" value="<?php echo $r['tanggal']; ?>" required>
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

  <!-- field supplier_id -->
  <div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="supplier_id" class="text-right middle">Supplier </label>
  </div>
  <div class="small-6 cell">
      <select name="supplier_id">
      <?php
        $db = new Database();
        $db->select('supplier','id, nama');
        $suppliers = $db->getResult();
        foreach ($suppliers as &$supplier){ 
          $selected =$r['supplier_id'] == $supplier['id'] ? 'selected' : '';
            echo "<option value=$supplier[id]  $selected > $supplier[nama] </option>";
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
  $nomer = $_POST['nomer'];
  $tanggal = $_POST['tanggal'];
  $total = $_POST['total'];
  $karyawan_id = $_POST['karyawan_id'];
  $supplier_id = $_POST['supplier_id'];  
  $db = new Database();
  $db->update('pembelian',array(
    'nomer'=>$nomer,
    'tanggal'=>$tanggal,
    'total'=>$total,
    'karyawan_id'=>$karyawan_id,
    'supplier_id'=>$supplier_id,
    
  ),
    "id=$id"
  );
  $res = $db->getResult();
//   print_r($res);
  header('Location: /laundry_online/index.php?module=pembelian');
}

?>