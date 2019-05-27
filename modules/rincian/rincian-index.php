<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data pemakaian tarif</li>
</ul>
</nav>
  <a href="?module=rincian-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>id</th>
          <th>jumlah </th>
          <th>Nama Pakaian </th> 
          <th>Jenis Laundry </th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('rincian', 'rincian.id, rincian.jumlah,
  rincian.tarif_id, rincian.jenis_laundry_id, 
  tarif.nama, jenis_laundry.nama as jenis_laundry', 
  'tarif ON tarif.id = rincian.tarif_id', 
  'jenis_laundry ON jenis_laundry.id = rincian.jenis_laundry_id');

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
            <td><?php echo $r['id'] ?></td>
            <td><?php echo $r['jumlah'] ?></td>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['jenis_laundry'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=rincian-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=rincian-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=rincian-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>