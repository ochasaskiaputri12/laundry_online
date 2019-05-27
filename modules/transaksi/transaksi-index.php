<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data transaksi</li>
</ul>
</nav>
  <a href="?module=transaksi-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>nomer</th>
          <th>tanggal transaksi</th>
          <th>tanggal ambil</th>
          <th>diskon</th>
          <th>Konsumen </th> 
          <th>Karyawan </th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('transaksi', 'transaksi.id, transaksi.nomer, transaksi.tanggal_transaksi, transaksi.tanggal_ambil, transaksi.diskon,
  transaksi.konsumen_id, transaksi.karyawan_id, 
  konsumen.nama, karyawan.nama as karyawan', 
  'konsumen ON konsumen.id = transaksi.konsumen_id', 
  'karyawan ON karyawan.id = transaksi.karyawan_id');

  $res=$db->getResult();
  if(count($res) == 0){ ?>
    <tr>
        <td colspan="8">Tidak ada data yang tersedia </td>
    </tr>
<?php
    }else{
        foreach ($res as &$r){?>
        <tr>
            <td><?php echo $r['nomer'] ?></td>
            <td><?php echo $r['tanggal_transaksi'] ?></td>
            <td><?php echo $r['tanggal_ambil'] ?></td>
            <td><?php echo $r['diskon'] ?></td>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['karyawan'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=transaksi-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=transaksi-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=transaksi-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>