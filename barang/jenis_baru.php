<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){
		$id_jenis = $_REQUEST['id_jenis'];
		$jenis_barang = $_REQUEST['jenis_barang'];

		$sql = mysqli_query($koneksi, "INSERT INTO jenis (jenis_barang) VALUES('$jenis_barang')");

		if($sql == true){
			header('Location: ./admin.php?hlm=jenis');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Data Master Jenis Barang</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="jenis_barang" class="col-sm-2 control-label">Jenis</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="jenis_barang" name="jenis_barang" placeholder="Masukkan Jenis" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=jenis" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
