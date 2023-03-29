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

		$sql = mysqli_query($koneksi, "UPDATE ruang SET tempat='$tempat', nama_ruang='$nama_ruang' WHERE id_ruang='$id_ruang'");

		if($sql == true){
			header('Location: ./admin.php?hlm=ruang');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_ruang = $_REQUEST['id_ruang'];

		$sql = mysqli_query($koneksi, "SELECT * FROM ruang WHERE id");
		while($row = mysqli_fetch_array($sql)){

?>
<h2>Edit Data Ruang</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Lantai</label>
		<div class="col-sm-2">
			<input type="hidden" name="id_ruang" value="<?php echo $row['id_ruang']; ?>">
			<input type="number" class="form-control" id="tempat" value="<?php echo $row['tempat']; ?>" name="tempat" required>
		</div>
	</div>
	<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label">Nama Ruang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama_ruang" value="<?php echo $row['nama_ruang']; ?>" name="nama_ruang" required>
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
}
?>
