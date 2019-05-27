<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data jenis_laundry</li>
</ul>
</nav>
  <a href="?module=jenis_laundry-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
        <th>Kode</th>
          <th>Nama</th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('jenis_laundry', 'id, kode,nama');
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
            <td>
                <div class="small button-group">
                    <a href="?module=jenis_laundry-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=jenis_laundry-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=jenis_laundry-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>