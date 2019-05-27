<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data Tarif barang</li>
</ul>
</nav>
  <a href="?module=tarif-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>Nama Pakaian</th>
          <th>harga </th>
          <th>jenis laundry </th> 
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('tarif', 'tarif.id, tarif.nama,tarif.harga,
  tarif.jenis_laundry_id, 
  jenis_laundry.nama as jenis_laundry', 
  'jenis_laundry ON jenis_laundry.id = tarif.jenis_laundry_id');
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
            <td><?php echo $r['harga'] ?></td>
            <td><?php echo $r['jenis_laundry'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=tarif-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=tarif-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=tarif-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>