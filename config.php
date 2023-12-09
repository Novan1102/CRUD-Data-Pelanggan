<?php
// Inisialisasi koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'sample';

$con = new mysqli($host, $user, $password, $database);

if ($con->connect_error) {
    // Hentikan program dan tampilkan pesan kesalahan jika koneksi gagal
    die('Connection failed: ' . $con->connect_error);
}
#flash message
function flash($name='',$msg='',$cate='green'){
    if(!empty($name)){
    // Jika ada pesan dan belum ada sesi untuk pesan tersebut
      if(!empty($msg)&&empty($_SESSION[$name])){
        $_SESSION[$name]=$name;
        $_SESSION[$name."_msg"]=$msg;
        $_SESSION[$name."_cate"]=$cate;
      }
      // Jika tidak ada pesan dan sesi untuk pesan tersebut sudah ada
      else if(empty($msg)&&!empty($_SESSION[$name])){
        // Tampilkan pesan dengan gaya yang sesuai
        echo "<div class='alert-{$_SESSION[$name."_cate"]}'>{$_SESSION[$name."_msg"]}</div>";
        // Hapus sesi setelah pesan ditampilkan
        unset($_SESSION[$name]);
        unset($_SESSION[$name."_msg"]);
        unset($_SESSION[$name."_cate"]);
      }
    }
  }
?>