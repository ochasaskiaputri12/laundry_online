<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data Barang</li>
</ul>
</nav>
  <a href="?module=barang-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>kode</th>
          <th>Nama</th>
          <th>Stok</th>
          <th>Tanggal</th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('barang', 'id, kode, nama, stok, tanggal_update_stok');
  $res=$db->getResult();
    if(count($res) == 0){ ?>
        <tr>
            <td colspan="8">Tidak ada data yang tersedia </td>
        </tr>
    <?php
        }else{
        foreach ($res as &$r){?>
        <tr>
            <td><?php echo $r['kode'] ?></td>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['stok'] ?></td>
            <td><?php echo $r['tanggal_update_stok'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=barang-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=barang-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=barang-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>