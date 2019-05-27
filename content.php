<?php

// cek apakah module sudah ada apa belum diparameter
$module = empty($_GET['module']) ? 'home' : $_GET['module'];

switch($module) {
    // Module Home
    case 'home':
    include 'home.php';
    break;


    // Module Karyawan
    case 'karyawan':
        include 'modules/karyawan/karyawan-index.php';
    break;
    case 'karyawan-create':
        include 'modules/karyawan/karyawan-create.php';
    break;
    case 'karyawan-edit':
        include 'modules/karyawan/karyawan-edit.php';
    break;
    case 'karyawan-delete':
        include 'modules/karyawan/karyawan-delete.php';
    break;
    case 'karyawan-show':
        include 'modules/karyawan/karyawan-show.php';
    break;
     // Module rincian
     case 'rincian':
     include 'modules/rincian/rincian-index.php';
 break;
 case 'rincian-create':
     include 'modules/rincian/rincian-create.php';
 break;
 case 'rincian-edit':
     include 'modules/rincian/rincian-edit.php';
 break;
 case 'rincian-delete':
     include 'modules/rincian/rincian-delete.php';
 break;
 case 'rincian-show':
     include 'modules/rincian/rincian-show.php';
 break;

    // Module Barang
    case 'barang':
    include 'modules/barang/barang-index.php';
    break;
    case 'barang-create':
    include 'modules/barang/barang-create.php';
    break;
    case 'barang-edit':
    include 'modules/barang/barang-edit.php';
    break;
    case 'barang-delete':
    include 'modules/barang/barang-delete.php';
    break;
    case 'barang-show':
    include 'modules/barang/barang-show.php';
    break;
   
     // Module konsumen
     case 'konsumen':
     include 'modules/konsumen/konsumen-index.php';
     break;
     case 'konsumen-create':
     include 'modules/konsumen/konsumen-create.php';
     break;
     case 'konsumen-edit':
     include 'modules/konsumen/konsumen-edit.php';
     break;
     case 'konsumen-delete':
     include 'modules/konsumen/konsumen-delete.php';
     break;
     case 'konsumen-show':
     include 'modules/konsumen/konsumen-show.php';
     break;
   
      // Module Supplier
    case 'supplier':
    include 'modules/supplier/supplier-index.php';
    break;
    case 'supplier-create':
    include 'modules/supplier/supplier-create.php';
    break;
    case 'supplier-edit':
    include 'modules/supplier/supplier-edit.php';
    break;
    case 'supplier-delete':
    include 'modules/supplier/supplier-delete.php';
    break;
    case 'supplier-show':
    include 'modules/supplier/supplier-show.php';
    break;

    // Module pemakaian_barang
    case 'pemakaian_barang':
    include 'modules/pemakaian_barang/pemakaian_barang-index.php';
    break;
    case 'pemakaian_barang-create':
    include 'modules/pemakaian_barang/pemakaian_barang-create.php';
    break;
    case 'pemakaian_barang-edit':
    include 'modules/pemakaian_barang/pemakaian_barang-edit.php';
    break;
    case 'pemakaian_barang-delete':
    include 'modules/pemakaian_barang/pemakaian_barang-delete.php';
    break;
    case 'pemakaian_barang-show':
    include 'modules/pemakaian_barang/pemakaian_barang-show.php';
    break;

      // Module pembelian
      case 'pembelian':
      include 'modules/pembelian/pembelian-index.php';
      break;
      case 'pembelian-create':
      include 'modules/pembelian/pembelian-create.php';
      break;
      case 'pembelian-edit':
      include 'modules/pembelian/pembelian-edit.php';
      break;
      case 'pembelian-delete':
      include 'modules/pembelian/pembelian-delete.php';
      break;
      case 'pembelian-show':
      include 'modules/pembelian/pembelian-show.php';
      break;

        // Module jenis_laundry
    case 'jenis_laundry':
    include 'modules/jenis_laundry/jenis_laundry-index.php';
    break;
    case 'jenis_laundry-create':
    include 'modules/jenis_laundry/jenis_laundry-create.php';
    break;
    case 'jenis_laundry-edit':
    include 'modules/jenis_laundry/jenis_laundry-edit.php';
    break;
    case 'jenis_laundry-delete':
    include 'modules/jenis_laundry/jenis_laundry-delete.php';
    break;
    case 'jenis_laundry-show':
    include 'modules/jenis_laundry/jenis_laundry-show.php';
    break;
    
    // Module tarif
    case 'tarif':
    include 'modules/tarif/tarif-index.php';
    break;
    case 'tarif-create':
    include 'modules/tarif/tarif-create.php';
    break;
    case 'tarif-edit':
    include 'modules/tarif/tarif-edit.php';
    break;
    case 'tarif-delete':
    include 'modules/tarif/tarif-delete.php';
    break;
    case 'tarif-show':
    include 'modules/tarif/tarif-show.php';
    break;

    // Module transaksi
    case 'transaksi':
    include 'modules/transaksi/transaksi-index.php';
    break;
    case 'transaksi-create':
    include 'modules/transaksi/transaksi-create.php';
    break;
    case 'transaksi-edit':
    include 'modules/transaksi/transaksi-edit.php';
    break;
    case 'transaksi-delete':
    include 'modules/transaksi/transaksi-delete.php';
    break;
    case 'transaksi-show':
    include 'modules/transaksi/transaksi-show.php';
    break;

    // Module rincian_pembelian
    case 'rincian_pembelian':
    include 'modules/rincian_pembelian/rincian_pembelian-index.php';
    break;
    case 'rincian_pembelian-create':
    include 'modules/rincian_pembelian/rincian_pembelian-create.php';
    break;
    case 'rincian_pembelian-edit':
    include 'modules/rincian_pembelian/rincian_pembelian-edit.php';
    break;
    case 'rincian_pembelian-delete':
    include 'modules/rincian_pembelian/rincian_pembelian-delete.php';
    break;
    case 'rincian_pembelian-show':
    include 'modules/rincian_pembelian/rincian_pembelian-show.php';
    break;

    // Module rincian_transaksi
    case 'rincian_transaksi':
    include 'modules/rincian_transaksi/rincian_transaksi-index.php';
    break;
    case 'rincian_transaksi-create':
    include 'modules/rincian_transaksi/rincian_transaksi-create.php';
    break;
    case 'rincian_transaksi-edit':
    include 'modules/rincian_transaksi/rincian_transaksi-edit.php';
    break;
    case 'rincian_transaksi-delete':
    include 'modules/rincian_transaksi/rincian_transaksi-delete.php';
    break;
    case 'rincian_transaksi-show':
    include 'modules/rincian_transaksi/rincian_transaksi-show.php';
    break;

    
    // Jika module tidak ditemukan maka di redirect ke home 
    default: include'home.php';  
}
?>