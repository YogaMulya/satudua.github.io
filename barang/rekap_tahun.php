<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}	if( isset( $_REQUEST['aksi2'] )){
		$aksi2 = $_REQUEST['aksi2'];
		switch($aksi2){
			case 'detail':
				include 'rekap_detail.php';
				break;
    }
	} else {


?>
<div class="container">
<form action="" method="get">
<h3 style="margin-bottom: -20px;">Rekap Pengajuan Barang</h3>

<div class="pull-right col-sm-2 ">
<input type="submit" class="btn btn-primary" name="tahun" value="tahun">
</div>
<div class="pull-right ">
<select name="tahun" id="" class="form-control">
<option value="">>- Pilih Tahun-<</option>
<?php
	$sql_tahun = mysqli_query($koneksi, "SELECT * FROM sub GROUP BY tahun ");
	while ($tahun = mysqli_fetch_array($sql_tahun)) {
	 	echo '<option value="'.$tahun['tahun'].'">'.$tahun['tahun'].'</option>';
	 } 
	 ?></select>
</div>
<br><hr>
<table class="table table-bordered">
<thead>
<tr class="info">
      <th>No</th>
      <th>Bulan</th>
      <th>Tahun</th>
      <th>Tindakan</th>
</tr>
</thead>
<tbody>
<?php
$tahun = $_REQUEST['tahun'];
    $sql = mysqli_query($koneksi,"SELECT * FROM sub where tahun='$tahun' GROUP BY bulan_tahun ");
    $no=0;
    while($row = mysqli_fetch_array($sql)){
      $no++;
?> <tr>
  <td><?=$no?></td>
  <td><?=$row['bulan']?></td>
  <td><?=$row['tahun']?></td>
  <td><a href="?hlm=rekap&aksi2=detail&bulan_tahun=<?=$row['bulan_tahun']?>" class="btn btn-primary">Detail</a></td>
<?php
    }
?>
</tbody>
</table>
</form>
</div>
<?php
    
}

?>
