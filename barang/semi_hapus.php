<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_sub = $_REQUEST['id_sub'];

    $sql = mysqli_query($koneksi, "DELETE FROM semi WHERE id_sub='$id_sub'");
    if($sql == true){
        header("Location: ./admin.php?hlm=transaksi&aksi=baru");
        die();
    }
    }
}
?>
