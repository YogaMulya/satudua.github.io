<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_POST['cari'] )){
		$_SESSION['pencarian'];
		$nama_barang = $_SESSION['pencarian'];
		}else {
			$nama_barang
		}
	} else {

		echo '

			<div class="container">

				<h3 style="margin-bottom: -20px;">Daftar Barang</h3>
				
		

	<div class="pull-right">
	<button class="btn btn-primary" type="submit" name="cari" id="cari"><span class="glyphicon glyphicon-search"></span></button>
					<a href="./admin.php?hlm=barang&aksi=baru" class="btn btn-success btn-s ">Tambah Barang</a>
					</div>
					<form method="POST" action="admin.php?hlm=cari_barang">
					
					
			
					
					<div class="col-sm-3 pull-right">
					<input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Search ...">
					
					</div>
					</form>
					<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="5%">No</th>
					 <th width="10%">Kode Barang</th>
					 <th width="15%">Nama Barang</th>
					 <th width="15%">Jenis Barang</th>
					 <th width="10%">Jumlah Barang</th>
					 <th width="10%">Satuan</th>
					 <th width="15%">Kadaluwarsa</th>
					 <th width="25%">Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM barang");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['id_barang'].'</td>
					 <td>'.$row['nama_barang'].'</td>
					 <td>'.$row['jenis_barang'].'</td>
					 <td>'.$row['jumlah'].'</td>
					 <td>'.$row['satuan'].'</td>
					 <td>'.$row['kadaluwarsa'].'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus barang ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					 <a href="?hlm=barang&aksi=edit&id_barang='.$row['id_barang'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=barang&aksi=hapus&submit=yes&id_barang='.$row['id_barang'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=barang&aksi=baru">Tambah Barang baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>