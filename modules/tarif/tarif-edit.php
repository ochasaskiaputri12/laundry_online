<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('tarif','*','','',"id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=tarif-edit?">Home</a></li>
  <li class="disabled">Data Tarif</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">nama</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="nama" placeholder="nama" value="<?php echo $r['nama']; ?>" required>
    </div>
  </div>

  <!-- field harga -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="harga" class="text-right middle">harga</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="harga" placeholder="harga" value="<?php echo $r['harga']; ?>" required>
    </div>
  </div>

   <!-- field jenis_laundry_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jenis_laundry_id" class="text-right middle">jenis_laundry </label>
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
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $jenis_laundry_id = $_POST['jenis_laundry_id'];
  $db = new Database();
  $db->update('tarif',array(
    'nama'=>$nama,
    'harga'=>$harga,
    'jenis_laundry_id'=>$jenis_laundry_id,
    
  ),
    "id=$id"
  );
  $res = $db->getResult();
//   print_r($res);
  header('Location: /laundry_online/index.php?module=tarif');
}

?>