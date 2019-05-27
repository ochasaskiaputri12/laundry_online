<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=barang?">Home</a></li>
  <li class="disabled">Detail barang Laundry</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('barang', 
'barang.id, 
barang.kode,
barang.nama,
barang.stok,
barang.tanggal_update_stok'
);
$res= $db->getResult();
// print_r($res);
if(count($res) == 0){ ?>
  <table>
    <tbody>
      <tr>
        <td>Data yang anda cari tidak ada atau terhapus</td>
      </tr>
    </tbody>
  </table>
<?php }else{
  foreach ($res as &$r){ 
?>
<table id="print-area">
  <tbody>
  <tr>
  <td>Kode barang :</td>
  <td><?php echo $r['kode']; ?></td>
</tr>
<tr>
  <td>Nama :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Stok :</td>
  <td><?php echo $r['stok']; ?></td>
</tr>
<tr>
  <td>Tanggal update barangs :</td>
  <td><?php echo $r['tanggal_update_stok']; ?></td>
</tr>
  </tbody>
</table>
<a class="button" href="javascript:printDiv('print-area');" >Print</a>
<a href="?module=rental-pelanggan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>

<style>
@media print {
   * { color: black; background: white; }
   table { font-size: 80%; }
}
</style>

<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

<script type="text/javascript">
     
     function printDiv(elementId) {
    var a = document.getElementById('print-area').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>
