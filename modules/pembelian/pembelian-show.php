<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pembelian?">Home</a></li>
  <li class="disabled">Detail Pembelian</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('pembelian', 
'pembelian.id, 
pembelian.nomer,
pembelian.tanggal,
pembelian.total,
pembelian.karyawan_id,
pembelian.supplier_id,
karyawan.nama as karyawan,
supplier.nama as supplier',
'karyawan ON karyawan.id = pembelian.karyawan_id' ,
'supplier ON suppleir.id = pembelian.supplier_id', "pembelian.id=$id"
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
  <td> Nomer Pembelian :</td>
  <td><?php echo $r['nomer']; ?></td>
</tr>
<tr>
  <td> Tanggal :</td>
  <td><?php echo $r['tanggal']; ?></td>
</tr>
<tr>
  <td> Total :</td>
  <td><?php echo $r['total']; ?></td>
</tr>
<tr>
  <td>Karyawan ID :</td>
  <td><?php echo $r['karyawan']; ?></td>
</tr>
<tr>
  <td>Supplier ID :</td>
  <td><?php echo $r['supplier']; ?></td>
</tr>
  </tbody>
</table>
<a class="button" href="javascript:printDiv('print-area');" >Print</a>
<a href="?module=pembelian-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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

