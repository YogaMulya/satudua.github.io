<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$id_jenis = $_REQUEST['id_jenis'];
		$jenis_barang = $_REQUEST['jenis_barang'];
		$sql = mysqli_query($koneksi, "UPDATE jenis SET jenis_barang='$jenis_barang' WHERE id_jenis='$id_jenis'");

		if($sql == true){
			header('Location: ./admin.php?hlm=jenis');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_jenis = $_REQUEST['id_jenis'];

		$sql = mysqli_query($koneksi, "SELECT * FROM jenis WHERE id_jenis='$id_jenis'");
		while($row = mysqli_fetch_array($sql)){

?>
<h2>Edit Data Jenis</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="jenis_barang" class="col-sm-2 control-label">Jenis Barang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="jenis_barang" value="<?php echo $row['jenis_barang']; ?>" name="jenis_barang" placeholder="Jenis Barang" required>
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
}
?>
