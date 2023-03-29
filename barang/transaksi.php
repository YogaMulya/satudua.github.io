<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'detail':
				include 'detail.php';
				break;
				case 'edit':
				include 'transaksi_edit.php';
				break;
			case 'hapus':
				include 'transaksi_hapus.php';
				break;
				case 'baru':
				include 'trx_baru.php';
				break;
				case 'valid':
				include 'valid.php';
				break;
				case 'approve':
				include 'approve.php';
				break;
				case 'ambil':
				include 'ambil.php';
				break;
		}
	} else {
		echo '

			<div class="container">
			
				<h3 style="margin-bottom: -20px;">Daftar Pengajuan</h3>
				<a href="./admin.php?hlm=transaksi&aksi=baru" class="btn btn-success btn-s pull-right">Tambah Pengajuan</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
				   	<th width="5%">No</th>
					 <th width="20%">No Nota</th>
					 <th width="20%">Koordinator</th>
					 <th width="15%">Tanggal</th>
					 <th width="18%">Tindakan</th>
					 </tr>
				 </thead>
				 <tbody>';
					 

				 if ($_SESSION['level'] == 3) {
					
		 	$sql = mysqli_query($koneksi, "SELECT * FROM transaksi ");

			if(mysqli_num_rows($sql) > 0){
		 		$no = 0;
				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['nota'].'</td>
					 <td>'.$row['koordinator'].'</td>
					 <td>'.$row['tanggal'].'</td>';
			 
						 
					 
					 if ($row['setuju'] == 1) {
						echo'
						<td><center>
						<a href="?hlm=transaksi&aksi=detail&nota='.$row['nota'].'" class="btn btn-primary btn-s ">Detail</a> 
						<a href="?hlm=transaksi&aksi=ambil&nota='.$row['nota'].'" class="btn btn-warning btn-s ">Ambil</a> <br><br>
						<a href="?hlm=transaksi&aksi=hapus&submit=yes&nota='.$row['nota'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
						
						</center>
						</td>
						';
				}else{
					echo'
					 
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus data ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>
					<center>
					<a href="?hlm=transaksi&aksi=approve&nota='.$row['nota'].'" class="btn btn-info btn-s">Approve</a> 
					<a href="?hlm=transaksi&aksi=valid&nota='.$row['nota'].'" class="btn btn-success">valid</a>
					</br></br>
					<a href="?hlm=transaksi&aksi=edit&nota='.$row['nota'].'" class="btn btn-warning btn-s">Edit</a>
					<a href="?hlm=transaksi&aksi=detail&nota='.$row['nota'].'" class="btn btn-primary btn-s">Detail</a> 
					<a href="?hlm=transaksi&aksi=hapus&submit=yes&nota='.$row['nota'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
					</center>
					</td>';}
			
}
			}
				
			}else {
				$koordinator = $_SESSION['koordinator'];
				$sql2 = mysqli_query($koneksi, "SELECT * FROM transaksi where koordinator ='$koordinator'");

			if(mysqli_num_rows($sql2) > 0){
		 		$no = 0;
				 while($row2 = mysqli_fetch_array($sql2)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row2['nota'].'</td>
					 <td>'.$row2['koordinator'].'</td>
					 <td>'.$row2['tanggal'].'</td>';
			
			
					 if ($_SESSION['level'] == 2) {
						 
					 
						if ($row2['setuju'] == 1) {
						   echo'
						   <td><center>
						   <a href="?hlm=transaksi&aksi=detail&nota='.$row2['nota'].'" class="btn btn-primary btn-s ">Detail</a> 
						   <a href="?hlm=transaksi&aksi=ambil&nota='.$row2['nota'].'" class="btn btn-warning btn-s ">Ambil</a> <br><br>
						   </center>
						   </td>
						   ';
				   }else{
					   echo'
						
						<td>
				
					   <script type="text/javascript" language="JavaScript">
							 function konfirmasi(){
								 tanya = confirm("Anda yakin akan menghapus data ini?");
								 if (tanya == true) return true;
								 else return false;
						   }
					   </script>
					   <a href="?hlm=transaksi&aksi=edit&nota='.$row2['nota'].'" class="btn btn-primary btn-s">Tambah</a>
					   <a href="?hlm=transaksi&aksi=detail&nota='.$row2['nota'].'" class="btn btn-success btn-s">Detail</a> 
					   <br><br>
					  
					   </td>';}
				}
			if ($_SESSION['level'] == 1) {
						 
					 
				if ($row2['setuju'] == 1) {
				   echo'
				   <td><center>
				   <a href="?hlm=transaksi&aksi=detail&nota='.$row2['nota'].'" class="btn btn-primary btn-s ">Detail</a> 
				   <a href="?hlm=transaksi&aksi=ambil&nota='.$row2['nota'].'" class="btn btn-warning btn-s ">Ambil</a> <br><br>
				   </center>
				   </td>
				   ';
		   }else{
			   echo'
				
				<td>

			   <script type="text/javascript" language="JavaScript">
					 function konfirmasi(){
						 tanya = confirm("Anda yakin akan menghapus data ini?");
						 if (tanya == true) return true;
						 else return false;
				   }
			   </script>
			  

			   <a href="?hlm=transaksi&aksi=detail&nota='.$row2['nota'].'" class="btn btn-primary btn-s">Detail</a> 
				
			   <a href="?hlm=transaksi&aksi=edit&nota='.$row2['nota'].'" class="btn btn-warning btn-s">Edit</a>
			   <br><br>
			   <a href="?hlm=transaksi&aksi=valid&nota='.$row2['nota'].'" class="btn btn-success">valid</a>
			   <a href="?hlm=transaksi&aksi=hapus&submit=yes&nota='.$row2['nota'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

			   </td>';}
	   }if ($_SESSION['level'] == 4) {
						 
					 
	if ($row2['setuju'] == 1) {
	   echo'
	   <td><center>
	   <a href="?hlm=transaksi&aksi=detail&nota='.$row2['nota'].'" class="btn btn-primary btn-s ">Detail</a> 
	   </center>
	   </td>
	   ';
}else{
   echo'
	
	<td>

   <script type="text/javascript" language="JavaScript">
		 function konfirmasi(){
			 tanya = confirm("Anda yakin akan menghapus data ini?");
			 if (tanya == true) return true;
			 else return false;
	   }
   </script>
   <a href="?hlm=transaksi&aksi=detail&nota='.$row2['nota'].'" class="btn btn-primary btn-s">Detail</a> 

   <a href="?hlm=transaksi&aksi=edit&nota='.$row2['nota'].'" class="btn btn-warning btn-s">Edit</a>
   
  
   </td>';}
}
				 }
				}
			
				}
			echo '
			 	</tbody>
			</table>
		</div>';
	}
}
?>