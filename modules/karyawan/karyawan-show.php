<?php require_once("database.php");

ob_start();
?> 
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=karyawan?">Home</a></li>
  <li class="disabled">Detail Karyawan Laundry</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('karyawan', 
'karyawan.id, 
karyawan.nik,
karyawan.nama,
karyawan.alamat,
karyawan.telp,
karyawan.gender'
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
  <td>Nomor Induk Karyawan :</td>
  <td><?php echo $r['nik']; ?></td>
</tr>
<tr>
  <td>Nama :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Alamat :</td>
  <td><?php echo $r['alamat']; ?></td>
</tr>
<tr>
  <td>Telephone :</td>
  <td><?php echo $r['telp']; ?></td>
</tr>
<tr>
  <td>Jenis Kelamin :</td>
  <td><?php echo $r['gender']; ?></td>
</tr>
  </tbody>
</table>
<a class="button" href="javascript:printDiv('print-area');" >Print</a>
<a href="?module=karyawan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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
