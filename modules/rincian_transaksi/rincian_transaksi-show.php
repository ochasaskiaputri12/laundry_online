<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian_transaksi?">Home</a></li>
  <li class="disabled">Detail Rincian transaksi</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('rincian_transaksi', 
'rincian_transaksi.id, 
rincian_transaksi.karyawan_id,
rincian_transaksi.konsumen_id,
rincian_transaksi.jumlah,
rincian_transaksi.transaksi_id,
rincian_transaksi.barang_id,
rincian_transaksi.jenis_laundry_id,
rincian_transaksi.tarif_id,
karyawan.nama as karyawan_id,
konsumen.nama as konsumen_id,
transaksi.nama as transaksi_id,
barang.nama as barang_id,
jenis_laundry.nama as jenis_laundry_id,
tarif.harga as tarif_id',
'karyawan ON karyawan.id = rincian_transaksi.karyawan_id' ,
'konsumen ON konsumen.id = rincian_transaksi.konsumen_id' ,
'transaksi ON transaksi.id = rincian_transaksi.transaksi_id' ,
'barang ON barang.id = rincian_transaksi.barang_id' ,
'jenis_laundry ON jenis_laundry.id = rincian_transaksi.jenis_laundry_id' ,
'tarif ON tarif.id = rincian_transaksi.tarif_id', 
'',
"rincian_transaksi.id=$id"
);
$res= $db->getResult();
print_r($res);
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
  <td> Karyawan ID :</td>
  <td><?php echo $r['karyawan_id']; ?></td>
</tr>
  <tr>
  <td> Konsumen ID :</td>
  <td><?php echo $r['konsumen_id']; ?></td>
</tr>
<tr>
<td> jumlah :</td>
<td><?php echo $r['jumlah']; ?></td>
</tr>
<tr>
  <td>transaksi ID :</td>
  <td><?php echo $r['transaksi_id']; ?></td>
</tr>
<tr>
  <td> barang ID :</td>
  <td><?php echo $r['barang_id']; ?></td>
</tr>
<tr>
  <td> jenis laundry ID :</td>
  <td><?php echo $r['jenis_laundry_id']; ?></td>
</tr>
<tr>
  <td>tarif ID :</td>
  <td><?php echo $r['tarif_id']; ?></td>
</tr>
  </tbody>
</table>
<a class="button" href="javascript:printDiv('print-area');" >Print</a>
<a href="?module=rincian_transaksi-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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