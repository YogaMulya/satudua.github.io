<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$id_barang = $_REQUEST['id_barang'];
		$nama_barang = $_REQUEST['nama_barang'];
		$jumlah = $_REQUEST['jumlah'];
		$satuan = $_REQUEST['satuan'];
		$kadaluwarsa = $_REQUEST['kadaluwarsa'];
		$id_user = $_SESSION['id_user'];
		$jenis_barang =$_REQUEST['jenis_barang'];

		$sql = mysqli_query($koneksi, "UPDATE barang SET jenis_barang='$jenis_barang',nama_barang='$nama_barang', jumlah='$jumlah', satuan='$satuan', kadaluwarsa='$kadaluwarsa' WHERE id_barang='$id_barang'");

		if($sql == true){
			header('Location: ./admin.php?hlm=barang');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_barang = $_REQUEST['id_barang'];

		$sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id_barang'");
		while($row = mysqli_fetch_array($sql)){

?>

<h2>Edit Data Barang</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nama_barang" value="<?php echo $row['nama_barang']; ?>"name="nama_barang" placeholder="Nama Barang">
		</div>
	</div>
<div class="form-group">
		<label for="jenis_barang" class="col-sm-2 control-label">Jenis Barang</label>
		<div class="col-sm-3">
			<select name="jenis_barang" id="jenis_barang" class="form-control" required>
				<option value="<?php echo $row['jenis_barang']; ?>"><?php echo $row['jenis_barang']; ?></option>
				<option value="">--- Pilih Jenis Barang ---</option>
				<option value="ATK">ATK</option>
				<option value="sanitasi">Sanitasi</option>
				<option value="sembako">Sembako</option>
			</select>
		</div>
	</div>
<div class="form-group">
		<label for="jumlah" class="col-sm-2 control-label">Jumlah Barang</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="jumlah" value="<?php echo $row['jumlah']; ?>"name="jumlah" placeholder="Jumlah Barang">
		</div>
	</div>
	<div class="form-group">
			<label for="satuan" class="col-sm-2 control-label">Satuan Barang</label>
			<div class="col-sm-3">
			<select name="satuan" id="satuan" class="form-control" required>
				<option value="<?php echo $row['satuan']?>"><?php echo $row['satuan']?></option>
				<option value="">--- Pilih Satuan ---</option>
				<option value="kilogram">Kilogram</option>
				<option value="buah">Buah</option>
				<option value="lusin">Lusin</option>
				<option value="liter">Liter</option>
				<option value="meter">Meter</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="kadaluwarsa" class="col-sm-2 control-label">Tanggal Kadaluwarsa</label>
		<div class="col-sm-3">
			<input type="date" value="<?php echo $row['kadaluwarsa']?>" class="form-control" id="kadaluwarsa" name="kadaluwarsa" placeholder="kadaluwarsa" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=transaksi" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
	}
}
?>
