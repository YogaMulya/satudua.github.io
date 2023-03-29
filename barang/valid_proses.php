<?php

include 'koneksi.php';
    if( isset( $_GET['kirim'] )){
    $id_sub = $_GET['id_sub'];
    $selesai = $_GET['selesai'];
    $sql = mysqli_query($koneksi, "UPDATE sub SET setuju='$selesai' WHERE id_sub='$id_sub'");
    }

?>
