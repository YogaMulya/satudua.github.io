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
				include 'satuan_baru.php';
				break;
			case 'edit':
				include 'satuan_edit.php';
				break;
			case 'hapus':
				include 'satuan_hapus.php';
				break;
		}
	} else {

		echo '

			<div class="container">
		
				<h3 style="margin-bottom: -20px;">Data Master Satuan</h3>
					<a href="./admin.php?hlm=satuan&aksi=baru" class="btn btn-success btn-s pull-right">Tambah Data</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="10%">No</th>
					 <th width="10%">id</th>
					 <th width="33%">Satuan</th>
					 <th width="33%">Tindakan</th>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM satuan");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['id_satuan'].'</td>
					 <td>'.$row['satuan'].'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus satuan ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					 <a href="?hlm=satuan&aksi=edit&id_satuan='.$row['id_satuan'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=satuan&aksi=hapus&submit=yes&id_satuan='.$row['id_satuan'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=satuan&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
