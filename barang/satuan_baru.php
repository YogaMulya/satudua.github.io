<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){
		$id_satuan = $_REQUEST['id_satuan'];
		$satuan = $_REQUEST['satuan'];

		$sql = mysqli_query($koneksi, "INSERT INTO satuan (satuan) VALUES('$satuan')");

		if($sql == true){
			header('Location: ./admin.php?hlm=satuan');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Data Master Satuan</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="satuan" class="col-sm-2 control-label">Satuan</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan" required>
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
