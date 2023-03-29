<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){
		$id_barang = $_REQUEST['id_barang'];
		$nama_barang = $_REQUEST['nama_barang'];
		$jenis_barang = ($_REQUEST['jenis_barang']);
		$jumlah = $_REQUEST['jumlah'];
		$kadaluwarsa = $_REQUEST['kadaluwarsa'];
		$satuan = $_REQUEST['satuan'];

		$sql = mysqli_query($koneksi, "INSERT INTO barang(id_barang,nama_barang, jenis_barang, jumlah, satuan, kadaluwarsa) VALUES('$id_barang','$nama_barang', '$jenis_barang', '$jumlah', '$satuan','$kadaluwarsa')");
		if($sql == true){
			header('Location: ./admin.php?hlm=barang');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Barang Baru</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
<div class="form-group">
		<label for="id_barang" class="col-sm-2 control-label">Kode Barang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="Kode Barang" >
		</div>
	</div>
	<div class="form-group">
		<label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
		</div>
	</div>
		<div class="form-group">
		<label for="jenis_barang" class="col-sm-2 control-label">Jenis Barang</label>
		<div class="col-sm-4">
<select name="jenis_barang" id="jenis_barang" class="form-control" required>
	<option value="">--- Pilih Jenis Barang ---</option>
	<?php
	$sql_jenis = mysqli_query($koneksi, "SELECT * FROM jenis") or die(mysqli_error($koneksi));
	while ($data_jenis = mysqli_fetch_array($sql_jenis)) {
	 	echo '<option value="'.$data_jenis['jenis_barang'].'">'.$data_jenis['jenis_barang'].'</option>';
	 } 
	 ?>
</select>

		</div>
	</div>
	<div class="form-group">
		<label for="jumlah" class="col-sm-2 control-label">Jumlah Barang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang" required>
		</div>
		
		

	</div>
			<div class="form-group">
		<label for="satuan" class="col-sm-2 control-label">Satuan</label>
		<div class="col-sm-4">
<select name="satuan" id="satuan" class="form-control" required>
	<option value="">--- Pilih Satuan ---</option>
	<?php
	$sql_satuan = mysqli_query($koneksi, "SELECT * FROM satuan") or die(mysqli_error($koneksi));
	while ($data_satuan = mysqli_fetch_array($sql_satuan)) {
	 	echo '<option value="'.$data_satuan['satuan'].'">'.$data_satuan['satuan'].'</option>';
	 } 
	 ?>
</select>

		</div>
	</div>
	<div class="form-group">
		<label for="kadaluwarsa" class="col-sm-2 control-label">Tanggal Kadaluwarsa</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="kadaluwarsa" name="kadaluwarsa" value="" placeholder="kadaluwarsa">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=transaksi&aksi=semi" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
