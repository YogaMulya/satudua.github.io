<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_ruang = $_REQUEST['id_ruang'];

    $sql = mysqli_query($koneksi, "DELETE FROM ruang WHERE id_ruang='$id_ruang'");
    if($sql == true){
        header("Location: ./admin.php?hlm=ruang");
        die();
    }
    }
}
?>
