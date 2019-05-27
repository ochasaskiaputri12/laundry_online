<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data rincian transaksi</li>
</ul>
</nav>
  <a href="?module=rincian_transaksi-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>Konsumen </th>
          <th>Jumlah </th>
          <th>Tarif </th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('rincian_transaksi', 'rincian_transaksi.id, rincian_transaksi.konsumen_id, rincian_transaksi.jumlah,
  rincian_transaksi.tarif_id, 
  konsumen.nama, tarif.harga as tarif', 
  'konsumen ON konsumen.id = rincian_transaksi.konsumen_id', 
  'tarif ON tarif.id = rincian_transaksi.tarif_id');

  $res=$db->getResult();
//   print_r($res);
if(count($res) == 0){ ?>
    <tr>
        <td colspan="8">Tidak ada data yang tersedia </td>
    </tr>
<?php
    }else{
        foreach ($res as &$r){?>
        <tr>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['jumlah'] ?></td>
            <td><?php echo $r['tarif'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=rincian_transaksi-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=rincian_transaksi-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=rincian_transaksi-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>