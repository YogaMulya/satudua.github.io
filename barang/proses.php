<?php
 include"koenksi.php";
		$id = $_REQUEST['trx'];
		$data = mysqli_query($koneksi,"SELECT trx,nama_barang,satuan,permintaan,tanggal,id_user,jenis_barang,id_barang,koordinator,nama
			  FROM semi WHERE trx='$id'");
		$d = mysqli_fetch_array($data);
		$trx = $d['trx'];
		$nama_barang = $d['nama_barang'];
		$permintaan = $d['permintaan'];
		$tanggal = $d['tanggal'];
		$id_user = $d['id_user'];
		$koordinator = $d['koordinator'];
		$nama = $d['nama'];
		$jenis_barang = $d['jenis_barang'];
		$id_barang = $d['id_barang'];
		$satuan = $d['satuan'];
		$sql = mysqli_query($koneksi, "INSERT
		 INTO sub ( nota, permintaan, nama_barang, tanggal, id_user, koordinator, nama, jenis_barang , id_barang,satuan)
		VALUES('$trx', '$permintaan', '$nama_barang', '$tanggal', '$id_user', '$koordinator', '$nama', '$jenis_barang', '$id_barang','$satuan' )");
		$query = mysqli_query($koneksi, "DELETE FROM semi WHERE trx='$id'");
		if($sql == true){
			header('Location: ./admin.php?hlm=transaksi');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya';
		}
	}
	?>