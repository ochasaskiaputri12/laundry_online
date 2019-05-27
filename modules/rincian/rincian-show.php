<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian?">Home</a></li>
  <li class="disabled">Detail Rincian</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('rincian', 
'rincian.id, 
rincian.jumlah,
rincian.tarif_id,
rincian.jenis_laundry_id,
tarif.nama as tarif,
jenis_laundry.nama as jenis_laundry',
'tarif ON tarif.id = rincian.tarif_id' ,
'jenis_laundry ON suppleir.id = rincian.jenis_laundry_id', "rincian.id=$id"
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
  <td> jumlah baju :</td>
  <td><?php echo $r['jumlah']; ?></td>
</tr>
<tr>
  <td>tarif ID :</td>
  <td><?php echo $r['tarif']; ?></td>
</tr>
<tr>
  <td>jenis_laundry ID :</td>
  <td><?php echo $r['jenis_laundry']; ?></td>
</tr>
  </tbody>
</table>
<a class="button" href="javascript:printDiv('print-area');" >Print</a>
<a href="?module=rincian-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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

