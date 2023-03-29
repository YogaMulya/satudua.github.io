<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_satuan = $_REQUEST['id_satuan'];

    $sql = mysqli_query($koneksi, "DELETE FROM satuan WHERE id_satuan='$id_satuan'");
    if($sql == true){
        header("Location: ./admin.php?hlm=satuan");
        die();
    }
    }
}
?>
