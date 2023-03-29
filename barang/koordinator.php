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
				include 'koordinator_baru.php';
				break;
			case 'edit':
				include 'koordinator_edit.php';
				break;
			case 'hapus':
				include 'koordinator_hapus.php';
				break;
		}
	} else {

		echo '

			<div class="container">

				<h3 style="margin-bottom: -20px;">Data Master Koordinator</h3>
					<a href="./admin.php?hlm=koordinator&aksi=baru" class="btn btn-success btn-s pull-right">Tambah Data</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="10%">No</th>
					 <th width="15%">Koordinator</th>
					 <th width="25%">Nama Koordinator</th>
					 <th width="20%">Lantai</th>
					 <th width="15%">Tindakan</th
					 
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM koor");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['koordinator'].'</td>
					 <td>'.$row['nama_koor'].'</td>
					 <td>'.$row['tempat_koor'].'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus koordinator ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					 <a href="?hlm=koordinator&aksi=edit&id_koordinator='.$row['id_koordinator'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=koordinator&aksi=hapus&submit=yes&id_koordinator='.$row['id_koordinator'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=koordinator&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
