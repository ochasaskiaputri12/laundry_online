<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data Pembelian</li>
</ul>
</nav>
  <a href="?module=pembelian-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>Nomer</th>
          <th>Tanggal </th>
          <th>Total </th> 
          <th>Karyawan </th>
          <th>Supplier </th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('pembelian', 'pembelian.id, pembelian.nomer, pembelian.tanggal,
                 pembelian.total, pembelian.karyawan_id, pembelian.supplier_id, 
                 karyawan.nama, supplier.nama as supplier', 
                 'karyawan ON karyawan.id = pembelian.karyawan_id', 
                 'supplier ON supplier.id = pembelian.supplier_id');
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
            <td><?php echo $r['tanggal'] ?></td>
            <td><?php echo $r['total'] ?></td>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['supplier'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=pembelian-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=pembelian-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=pembelian-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>