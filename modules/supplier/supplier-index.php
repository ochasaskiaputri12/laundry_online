<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data supplier</li>
</ul>
</nav>
  <a href="?module=supplier-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Telphone</th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('supplier', 'id, nama, alamat, telp');
  $res=$db->getResult();
  if(count($res) == 0){ ?>
    <tr>
        <td colspan="8">Tidak ada data yang tersedia </td>
    </tr>
<?php
    }else{
        foreach ($res as &$r){?>
        <tr>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['alamat'] ?></td>
            <td><?php echo $r['telp'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=supplier-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=supplier-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=supplier-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>