<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
?>
<h3>Detail Transaksi </h3><div class="pull-right">
<div class="form-group">
<span class="pull-right">
<a href="./admin.php?hlm=transaksi" class="btn btn-danger">Kembali</a></span>
<?php
              $getqheader=mysqli_query($koneksi, "select * from transaksi where nota='$_GET[nota]'");
              $getqheader=mysqli_fetch_assoc($getqheader);
            ?>

<div class="form-group">
<span class="pull-left">
<label for="nota" class="col-sm-4">No. nota</label>
</span>
<div class="col-sm-2">
<input type="text" name="nota" class="form-control" value="<?= $getqheader['nota'] ?>" readonly>
</div>
</div>
  
<br><br><hr>
<?php
              $getqheader=mysqli_query($koneksi, "select * from transaksi where nota='$_GET[nota]'");
              $getqheader=mysqli_fetch_assoc($getqheader);
            ?>

<div class="form">
<div class="container">
<table>
						<tr>
    						<td><span class="subtitle is-5">Koordinator</span></td>
                <td><span class="subtitle is-5">&nbsp:&nbsp</span></td>
    						<td><span class="subtitle is-5"><?= $getqheader['koordinator'] ?></span></td>
    					</tr>
    					</tr>
    					<tr>
    						<td><span class="subtitle is-5">Tanggal Pengajuan</span></td>
                <td><span class="subtitle is-5">&nbsp:&nbsp</span></td>
    						<td><span class="subtitle is-5"><?= $getqheader['tanggal'] ?></span></td>
    					</tr>
    					</tr>
    				</table>
					<hr>
<table class="table table-bordered">
<thead>
 <tr class="success">
	<th>No</th>
	<th>Nama barang</th>
	<th>Jenis Barang</th>
	<th>Satuan</th>
	<th>Permintaan</th>
 </tr>
</thead>
<tbody>
<?php
$nota = $_REQUEST['nota'];
	$data=mysqli_query($koneksi, "SELECT * from sub where nota='$nota'");
	$no =1;
	while ($f=mysqli_fetch_assoc($data)) {
		?>
<tr>
			<td><?= $no++ ?></td>
			<td><?= $f['nama_barang'] ?></td>
			<td><?= $f['jenis_barang'] ?></td>
			<td><?= $f['satuan']?></td>
			<td><?= $f['permintaan']?></td>
</tr>
</tbody>
<?php
}
?>
</table>
</div>
</div>
	<?php
    }

?>
