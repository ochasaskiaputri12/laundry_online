<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('rincian_pembelian','*','','',"id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian_pembelian-edit?">Home</a></li>
  <li class="disabled">Data Pemakaian Barang</li>
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

  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">jumlah</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="jumlah" placeholder="jumlah" value="<?php echo $r['jumlah']; ?>" required>
    </div>
  </div>

  <!-- field barang_id -->
  <div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="barang_id" class="text-right middle">Barang </label>
  </div>
  <div class="small-6 cell">
      <select name="barang_id">
      <?php
        $db = new Database();
        $db->select('barang','id, nama');
        $barangs = $db->getResult();
        foreach ($barangs as &$barang){ 
          $selected =$r['barang_id'] == $barang['id'] ? 'selected' : '';
            echo "<option value=$barang[id]  $selected > $barang[nama] </option>";
        }?>
      </select>
</div>
</div>



  <!-- field pembelian_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pembelian_id" class="text-right middle">pembelian </label>
    </div>
    <div class="small-6 cell">
      <select name="pembelian_id">
      <?php
        $db = new Database();
        $db->select('pembelian','id, tanggal');
        $pembelians = $db->getResult();
        foreach ($pembelians as &$pembelian){ 
          $selected =$r['pembelian_id'] == $pembelian['id'] ? 'selected' : '';
            echo "<option value=$pembelian[id]  $selected > $pembelian[tanggal] </option>";
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
  $jumlah = $_POST['jumlah'];
  $barang_id = $_POST['barang_id'];
  $pembelian_id = $_POST['pembelian_id'];
  $db = new Database();
  $db->update('rincian_pembelian',array(
    'nomer'=>$nomer,
    'jumlah'=>$jumlah,
    'barang_id'=>$barang_id,
    'pembelian_id'=>$pembelian_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
//   print_r($res);
  header('Location: /laundry_online/index.php?module=rincian_pembelian');
}

?>