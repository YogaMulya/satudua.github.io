<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$id_satuan = $_REQUEST['id_satuan'];
		$satuan = $_REQUEST['satuan'];
		$sql = mysqli_query($koneksi, "UPDATE satuan SET satuan='$satuan' WHERE id_satuan='$id_satuan'");

		if($sql == true){
			header('Location: ./admin.php?hlm=satuan');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_satuan = $_REQUEST['id_satuan'];

		$sql = mysqli_query($koneksi, "SELECT * FROM satuan WHERE id_satuan='$id_satuan'");
		while($row = mysqli_fetch_array($sql)){

?>
<h2>Edit Data Satuan</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="satuan" class="col-sm-2 control-label">Satuan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="satuan" value="<?php echo $row['satuan']; ?>" name="satuan" placeholder="Satuan" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=satuan" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php

	}
	}
}
?>
