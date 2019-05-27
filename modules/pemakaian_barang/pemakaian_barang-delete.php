<?php
require_once('database.php');
$db=new Database();
$id = $_GET['id'];

$db->delete('pemakaian_barang',"id=$id");
$res = $db->getResult();
  if($res){
    header('Location: /laundry_online/index.php?module=pemakaian_barang');
   }else{
    echo "Upss Something wrong..";
   }
  
?>