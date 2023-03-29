<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_jenis = $_REQUEST['id_jenis'];

    $sql = mysqli_query($koneksi, "DELETE FROM jenis WHERE id_jenis='$id_jenis'");
    if($sql == true){
        header("Location: ./admin.php?hlm=id_jenis");
        die();
    }
    }
}
?>
