<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_barang = $_REQUEST['id_barang'];

    $sql = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id_barang'");
    if($sql == true){
        header("Location: ./admin.php?hlm=barang");
        die();
    }
    }
}
?>