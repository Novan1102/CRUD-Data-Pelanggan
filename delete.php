<?php
  session_start();
  // Mengimpor file konfigurasi database
  include "config.php";
  
  // Query SQL untuk menghapus data pengguna berdasarkan ID
  $sql="DELETE FROM users_data WHERE UID='{$_GET["id"]}'";
  // Eksekusi query dan cek keberhasilan
  if($con->query($sql)){
    // Jika penghapusan berhasil, set pesan kilat dan arahkan kembali ke halaman utama
    flash('msg','User Deleted Successfully');
    header("location:index.php");
  }else{
    // Jika penghapusan gagal, set pesan kilat dengan warna merah dan arahkan kembali ke halaman utama
    flash('msg','User Deleted Failed','red');
    header("location:index.php");
  }
?>