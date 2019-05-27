<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('rincian_transaksi','*','','',"id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian_transaksi-edit?">Home</a></li>
  <li class="disabled">Data Pemakaian transaksi</li>
</ul>
</nav>
<form action="" method="post">

<!-- field karyawan_id -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="karyawan_id" class="text-right middle">karyawan </label>
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

<!-- field konsumen_id -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="konsumen_id" class="text-right middle">konsumen </label>
    </div>
    <div class="small-6 cell">
      <select name="konsumen_id">
      <?php
        $db = new Database();
        $db->select('konsumen','id, nama');
        $konsumens = $db->getResult();
        foreach ($konsumens as &$konsumen){ 
          $selected =$r['konsumen_id'] == $konsumen['id'] ? 'selected' : '';
            echo "<option value=$konsumen[id]  $selected > $konsumen[nama] </option>";
        }?>
      </select>
    </div>
  </div>


  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">Jumlah</label>
    </div>
    <div class="small-6 cell">
    <input type="hidden" name="id" value="<?php echo $r['id']; ?>">    
      <input type="text" name="jumlah" placeholder="jumlah" value="<?php echo $r['jumlah']; ?>" required>
    </div>
  </div>

  <!-- field transaksi_id -->
  <div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="transaksi_id" class="text-right middle">Transaksi </label>
  </div>
  <div class="small-6 cell">
      <select name="transaksi_id">
      <?php
        $db = new Database();
        $db->select('transaksi','id, nomer');
        $transaksis = $db->getResult();
        foreach ($transaksis as &$transaksi){ 
          $selected =$r['transaksi_id'] == $transaksi['id'] ? 'selected' : '';
            echo "<option value=$transaksi[id]  $selected > $transaksi[nomer] </option>";
        }?>
      </select>
</div>
</div>

<!-- field barang_id -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="barang_id" class="text-right middle">barang </label>
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

<!-- field jenis_laundry_id -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jenis_laundry_id" class="text-right middle">Jenis Laundry </label>
    </div>
    <div class="small-6 cell">
      <select name="jenis_laundry_id">
      <?php
        $db = new Database();
        $db->select('jenis_laundry','id, nama');
        $jenis_laundrys = $db->getResult();
        foreach ($jenis_laundrys as &$jenis_laundry){ 
          $selected =$r['jenis_laundry_id'] == $jenis_laundry['id'] ? 'selected' : '';
            echo "<option value=$jenis_laundry[id]  $selected > $jenis_laundry[nama] </option>";
        }?>
      </select>
    </div>
  </div>

  <!-- field tarif_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tarif_id" class="text-right middle">Tarif </label>
    </div>
    <div class="small-6 cell">
      <select name="tarif_id">
      <?php
        $db = new Database();
        $db->select('tarif','id, harga');
        $tarifs = $db->getResult();
        foreach ($tarifs as &$tarif){ 
          $selected =$r['tarif_id'] == $tarif['id'] ? 'selected' : '';
            echo "<option value=$tarif[id]  $selected > $tarif[harga] </option>";
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
  $jumlah = $_POST['jumlah'];
  $transaksi_id = $_POST['transaksi_id'];
  $tarif_id = $_POST['tarif_id'];
  $db = new Database();
  $db->update('rincian_transaksi',array(
    'jumlah'=>$jumlah,
    'transaksi_id'=>$transaksi_id,
    'tarif_id'=>$tarif_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
//   print_r($res);
  header('Location: /laundry_online/index.php?module=rincian_transaksi');
}

?>