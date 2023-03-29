<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){
		$id_ruang = $_REQUEST['id_ruang'];
		$tempat = $_REQUEST['tempat'];
		$nama_ruang = $_REQUEST['nama_ruang'];

		$sql = mysqli_query($koneksi, "INSERT INTO ruang(tempat, nama_ruang) VALUES('$tempat', '$nama_ruang')");

		if($sql == true){
			header('Location: ./admin.php?hlm=ruang');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Data Ruang Baru</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Lantai</label>
		<div class="col-sm-2">
			<input type="number" class="form-control" id="tempat" name="tempat" placeholder="Masukkan Lantai" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama_ruang" class="col-sm-2 control-label">Nama Ruang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama_ruang" name="nama_ruang" placeholder="Masukkan Nama Ruang" required>
		</div>

	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=ruang" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
