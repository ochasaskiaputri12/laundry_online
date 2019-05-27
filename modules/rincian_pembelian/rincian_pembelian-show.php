<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian_pembelian?">Home</a></li>
  <li class="disabled">Detail Rincian Pembelian</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('rincian_pembelian', 
'rincian_pembelian.id, 
rincian_pembelian.nomer,
rincian_pembelian.jumlah,
rincian_pembelian.barang_id,
rincian_pembelian.rincian_pembelian_id,
barang.nama as barang,
rincian_pembelian.nama as rincian_pembelian',
'barang ON barang.id = rincian_pembelian.barang_id' ,
'rincian_pembelian ON suppleir.id = rincian_pembelian.rincian_pembelian_id', "rincian_pembelian.id=$id"
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
  <td> Nomer Rincian rincian_pembelian :</td>
  <td><?php echo $r['nomer']; ?></td>
</tr>
<tr>
  <td> jumlah :</td>
  <td><?php echo $r['jumlah']; ?></td>
</tr>
<tr>
  <td>barang ID :</td>
  <td><?php echo $r['barang']; ?></td>
</tr>
<tr>
  <td>rincian_pembelian ID :</td>
  <td><?php echo $r['rincian_pembelian']; ?></td>
</tr>
  </tbody>
</table>
<a class="button" href="javascript:printDiv('print-area');" >Print</a>
<a href="?module=rincian_pembelian-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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

