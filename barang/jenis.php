<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'jenis_baru.php';
				break;
			case 'edit':
				include 'jenis_edit.php';
				break;
			case 'hapus':
				include 'jenis_hapus.php';
				break;
		}
	} else {

		echo '

			<div class="container">
		
				<h3 style="margin-bottom: -20px;">Data Master Jenis</h3>
					<a href="./admin.php?hlm=jenis&aksi=baru" class="btn btn-success btn-s pull-right">Tambah Data</a>
				<br/><hr/>
				<div>
				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="10%">No</th>
					 <th width="10%">id</th>
					 <th width="33%">Jenis</th>
					 <th width="20%">Tindakan</th>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM jenis");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['id_jenis'].'</td>
					 <td>'.$row['jenis_barang'].'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus jenis ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					 <a href="?hlm=jenis&aksi=edit&id_jenis='.$row['id_jenis'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=jenis&aksi=hapus&submit=yes&id_jenis='.$row['id_jenis'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=jenis&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			
			</div>
		</div>';
	}
}
?>
