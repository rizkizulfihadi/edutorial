<?php
include __DIR__ . '/includes/header-auth.php';
require __DIR__ . "/functions/functions.php";

$connection = getConnection();

$id = $_GET["id"];

if( deleteArtikel($id) > 0 ){
    echo "
    <script type='text/javascript'>
    swal('Artikel Berhasil dihapus', 'success'); 
    function redirect(){
      window.location.href = 'post.php';
    }
    setTimeout(redirect, 2000)
    </script>";
}else{
    echo "
    <script type='text/javascript'>
      swal('', 'Artikel gagal dibuat', 'danger'); 
    </script>";
}

include __DIR__ . '/includes/footer-auth.php';