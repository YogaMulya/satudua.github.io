<?php 
include "koneksi.php";
$id_barang = $_GET['id_barang'];
$sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id_barang'");
$brg = mysqli_fetch_array($sql);
$data = array(
	'nama_barang' => $brg ['nama_barang'], 
	'jenis_barang' => $brg ['jenis_barang'], 
	'satuan' => $brg ['satuan'],
	'jumlah' => $brg ['jumlah']
);
echo json_encode($data);
 ?>