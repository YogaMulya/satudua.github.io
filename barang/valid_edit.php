<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_POST['submit'] )){

		$id_sub = $_REQUEST['id_sub'];
		$setuju = $_REQUEST['setuju'];
		$sql = mysqli_query($koneksi, "UPDATE sub SET setuju='$setuju' WHERE id_sub='$id_sub'");
        $nota = $_REQUEST['nota'];
        $sql4 = mysqli_query($koneksi, "SELECT * from transaksi where nota='$nota'");
        $row3 = mysqli_fetch_array($sql4);
        if($sql == true){
            header('Location: ./admin.php?hlm=transaksi&aksi=valid&nota='.$row3['nota'].'');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	}	if( isset( $_POST['kembali'] )){
        $nota = $_REQUEST['nota'];
        $sql5 = mysqli_query($koneksi, "SELECT * from transaksi where nota='$nota'");
        $row4 = mysqli_fetch_array($sql5);
        if($sql5 == true){
            header('Location: ./admin.php?hlm=transaksi&aksi=valid&nota='.$row4['nota'].'');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	}  else {

		
        $data=mysqli_query($koneksi, "SELECT *
        FROM sub
        INNER JOIN barang ON barang.id_barang=sub.id_barang WHERE sub.id_sub='$_GET[id_sub]'");
        $no =1;
        while ($f=mysqli_fetch_assoc($data)) {

?>
<h2>Validasi</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="satuan" class="col-sm-2 control-label">permintaan</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="satuan" value="<?php echo $f['permintaan']; ?>" name="satuan" placeholder="Satuan" readonly>
            <input type="text" class="form-control hidden" id="nota" value="<?php echo $row2['nota']; ?>" name="nota" placeholder="Satuan" readonly>
            <input type="text" class="form-control hidden" id="nota" value="<?php echo $f['nota']; ?>" name="nota" placeholder="Satuan" readonly>
		</div>
        <label for="satuan" class="col-sm-2 control-label">Jumlah Yang Tersedia</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="satuan" value="<?php echo $f['jumlah']; ?>" name="satuan" placeholder="Satuan" readonly>
		</div>
	</div>
    <div class="form-group">
		
        <label for="satuan" class="col-sm-2 control-label">Jumlah Yang Disetujui</label>
		<div class="col-sm-2">
			<input type="number" class="form-control" id="setuju" name="setuju" value="<?php echo $f['setuju']; ?>" placeholder="Disetujui" >
		</div>
        </div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Selesai</button>
			<button type="submit" name="kembali" class="btn btn-danger">kembali</button>
		</div>
	</div>
</form>
<?php

	}
	}
}
?>
