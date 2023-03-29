<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){
		$id_koordinator = $_REQUEST['id_koordinator'];
		$koordinator = $_REQUEST['koordinator'];
		$nama_koor = $_REQUEST['nama_koor'];
		$tempat_koor = $_REQUEST['tempat_koor'];
		$sql = mysqli_query($koneksi, "INSERT INTO koor(koordinator, nama_koor, tempat_koor) VALUES('$koordinator', '$nama_koor', '$tempat_koor')");

		if($sql == true){
			header('Location: ./admin.php?hlm=koordinator');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Data Koordinator Baru</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="koordinator" class="col-sm-2 control-label">Bidang Koordinaator</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="koordinator" name="koordinator" placeholder="Masukkan Koordinaator" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama_koor" class="col-sm-2 control-label">Nama Pengkoordinator</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nama_koor" name="nama_koor" placeholder="Masukkan Nama Pengkoordinator" required>
		</div>
</div>
	<div class="form-group">
		<label for="tempat_koor" class="col-sm-2 control-label">Lantai</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="tempat_koor" name="tempat_koor" placeholder="Masukkan Tempat Koordinator" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=koordinator" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
