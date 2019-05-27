<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('rincian','*','','',"id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian-edit?">Home</a></li>
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
    <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="jumlah" placeholder="jumlah" value="<?php echo $r['jumlah']; ?>" required>
    </div>
  </div>

  <!-- field tarif_id -->
  <div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tarif_id" class="text-right middle">Nama Pakaian</label>
  </div>
  <div class="small-6 cell">
      <select name="tarif_id">
      <?php
        $db = new Database();
        $db->select('tarif','id, nama');
        $tarifs = $db->getResult();
        foreach ($tarifs as &$tarif){ 
          $selected =$r['tarif_id'] == $tarif['id'] ? 'selected' : '';
            echo "<option value=$tarif[id]  $selected > $tarif[nama] </option>";
        }?>
      </select>
</div>
</div>



  <!-- field jenis_laundry_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jenis_laundry_id" class="text-right middle">jenis laundry </label>
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
  $jumlah = $_POST['jumlah'];
  $tarif_id = $_POST['tarif_id'];
  $jenis_laundry_id = $_POST['jenis_laundry_id'];
  $db = new Database();
  $db->update('rincian',array(
    'jumlah'=>$jumlah,
    'tarif_id'=>$tarif_id,
    'jenis_laundry_id'=>$jenis_laundry_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
//   print_r($res);
  header('Location: /laundry_online/index.php?module=rincian');
}

?>