<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data Rincian Pembelian</li>
</ul>
</nav>
  <a href="?module=rincian_pembelian-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>nomer</th>
          <th>jumlah </th>
          <th>Barang </th> 
          <th>pembelian </th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('rincian_pembelian', 'rincian_pembelian.id, rincian_pembelian.nomer, rincian_pembelian.jumlah,
  rincian_pembelian.barang_id, rincian_pembelian.pembelian_id, 
  barang.nama, pembelian.tanggal as pembelian', 
  'barang ON barang.id = rincian_pembelian.barang_id', 
  'pembelian ON pembelian.id = rincian_pembelian.pembelian_id');

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
            <td><?php echo $r['nomer'] ?></td>
            <td><?php echo $r['jumlah'] ?></td>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['pembelian'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=rincian_pembelian-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=rincian_pembelian-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=rincian_pembelian-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>