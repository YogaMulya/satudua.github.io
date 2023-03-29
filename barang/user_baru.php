<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$nama = $_REQUEST['nama'];
		$tempat = $_REQUEST['tempat'];
		$hp = $_REQUEST['hp'];
		$level = $_REQUEST['level'];
		$koordinator = $_REQUEST['koordinator'];

		$sql = mysqli_query($koneksi, "INSERT INTO user(username, password, nama, tempat, hp, level, koordinator) VALUES('$username', '$password', '$nama', '$tempat', '$hp', '$level', '$koordinator')");
		if($sql == true){
			header('Location: ./admin.php?hlm=user');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah User Baru</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="username" name="password" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama User</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User" required>
		</div>
	</div>
	<div class="form-group">
		<label for="koordinator" class="col-sm-2 control-label">Koordinator</label>
		<div class="col-sm-4">
<select name="koordinator" id="koordinator" class="form-control" required>
	<option value="">--- Pilih Koordinator ---</option>
	<?php
	$sql_koor = mysqli_query($koneksi, "SELECT * FROM koor") or die(mysqli_error($koneksi));
	while ($data_koor = mysqli_fetch_array($sql_koor)) {
	 	echo '<option value="'.$data_koor['nama_koor'].'">'.$data_koor['nama_koor'].'</option>';
	 } 
	 ?>
</select>
		</div>
	</div>
	<div class="form-group">
		<label for="tempat" class="col-sm-2 control-label">Ruangan</label>
		<div class="col-sm-4">
<select name="tempat" id="tempat" class="form-control" required="">
	<option value="">--- Pilih Nama Ruangan ---</option>
	<?php
	$sql_ruangan = mysqli_query($koneksi, "SELECT * FROM ruang") or die(mysqli_error($koneksi));
	while ($data_ruang = mysqli_fetch_array($sql_ruangan)) {
	 	echo '<option value="'.$data_ruang['nama_ruang'].'">'.$data_ruang['nama_ruang'].'</option>';
	 } 
	 ?>
</select>
		</div>
	</div>
	<div class="form-group">
		<label for="hp" class="col-sm-2 control-label">Nomor HP</label>
		<div class="col-sm-4">

			<input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor HP" required >
		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis User</label>
		<div class="col-sm-4">
			<select name="level" class="form-control" required>
			<center><option value="">--- Pilih Jenis User ---</option></center>	
				<option value="2">User Biasa</option>
				<option value="1">Admin</option>
				<option value="3">Supervisor</option>
				<option value="4">Koordinator</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=user" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
