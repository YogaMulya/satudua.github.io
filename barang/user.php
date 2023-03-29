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
				include 'user_baru.php';
				break;
			case 'edit':
				include 'user_edit.php';
				break;
			case 'hapus':
				include 'user_hapus.php';
				break;
		}
	} else {

		echo '

			<div class="container">
		
				<h3 style="margin-bottom: -20px;">Daftar User</h3>
					<a href="./admin.php?hlm=user&aksi=baru" class="btn btn-success btn-s pull-right">Tambah User</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="5%">No</th>
					 <th width="22%">Username</th>
					 <th width="22%">Nama</th>
					 <th width="22%">Koordinator</th>
					 <th width="15%">Level</th>
					 <th width="20%">Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM user");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['username'].'</td>
					 <td>'.$row['nama'].'</td>
					<td>'.$row['koordinator'].'</td>
					 <td>';

					 if($row['level'] == 1){
						 echo 'Admin';
					 }
					 if($row['level'] == 3){
					 	echo "Super";
					 }
					 if($row['level'] == 2){
						 echo 'User Biasa';
					 }
					 if($row['level'] == 4){
						echo 'Koordinator';
					}
					 echo'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus user ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					 <a href="?hlm=user&aksi=edit&id_user='.$row['id_user'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=user&aksi=hapus&submit=yes&id_user='.$row['id_user'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=user&aksi=baru">Tambah user baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
