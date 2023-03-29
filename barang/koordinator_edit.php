<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$id_koordinator = $_REQUEST['id_koordinator'];
		$koordinator = $_REQUEST['koordinator'];
		$tempat_koor = $_REQUEST['tempat_koor'];
		$nama_koor = $_REQUEST['nama_koor'];

		$sql = mysqli_query($koneksi, "UPDATE koor SET koordinator='$koordinator', nama_koor='$nama_koor', tempat_koor='$tempat_koor' WHERE id_koordinator='$id_koordinator'");

		if($sql == true){
			header('Location: ./admin.php?hlm=koordinator');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_koordinator = $_REQUEST['id_koordinator'];

		$sql = mysqli_query($koneksi, "SELECT * FROM koor WHERE id_koordinator='$id_koordinator'");
		while($row = mysqli_fetch_array($sql)){

?>
<h2>Edit Data Ruang</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="koordinator" class="col-sm-2 control-label">Koordinator</label>
		<div class="col-sm-2">
			<input type="hidden" name="id_koordinator" value="<?php echo $row['id_koordinator']; ?>">
			<input type="text" class="form-control" id="koordinator" value="<?php echo $row['koordinator']; ?>" name="koordinator" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama_koor" class="col-sm-2 control-label">Nama Koordinator</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama_koor" value="<?php echo $row['nama_koor']; ?>" name="nama_koor" required>
		</div>
	</div>
		<div class="form-group">
		<label for="tempat_koor" class="col-sm-2 control-label">Lantai</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="tempat_koor" value="<?php echo $row['tempat_koor']; ?>" name="tempat_koor" required>
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
