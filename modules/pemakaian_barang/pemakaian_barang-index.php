<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data pemakaian barang</li>
</ul>
</nav>
  <a href="?module=pemakaian_barang-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>kode</th>
          <th>jumlah </th>
          <th>Barang </th> 
          <th>Karyawan </th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('pemakaian_barang', 'pemakaian_barang.id, pemakaian_barang.kode, pemakaian_barang.jumlah,
  pemakaian_barang.barang_id, pemakaian_barang.karyawan_id, 
  barang.nama, karyawan.nama as karyawan', 
  'barang ON barang.id = pemakaian_barang.barang_id', 
  'karyawan ON karyawan.id = pemakaian_barang.karyawan_id');

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
            <td><?php echo $r['kode'] ?></td>
            <td><?php echo $r['jumlah'] ?></td>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['karyawan'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=pemakaian_barang-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=pemakaian_barang-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=pemakaian_barang-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>