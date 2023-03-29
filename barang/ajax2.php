<?php
include "koneksi.php";
$nama_barang = $_GET['nama_barang'];
$sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama_barang='$nama_barang'");
$brg1 = mysqli_fetch_array($sql);
$data1 = array(
	'id_barang' => $brg1 ['id_barang'],
	'jenis_barang' => $brg1 ['jenis_barang'],
	'satuan' => $brg1 ['satuan'],
	'jumlah' => $brg1 ['jumlah']
);
echo json_encode($data1);
 ?>
