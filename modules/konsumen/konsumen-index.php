<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data Konsumen</li>
</ul>
</nav>
  <a href="?module=konsumen-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('konsumen', 'id, kode, nama, alamat');
  $res=$db->getResult();
    if(count($res) == 0){ ?>
        <tr>
            <td colspan="3">Data tidak tersedia.</td>
        </tr>
    <?php }else{
        foreach ($res as &$r){?>
        <tr>
            <td><?php echo $r['kode'] ?></td>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['alamat'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=konsumen-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=konsumen-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=konsumen-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php } }?>
</table>