<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_koordinator = $_REQUEST['id_koordinator'];

    $sql = mysqli_query($koneksi, "DELETE FROM koor WHERE id_koordinator='$id_koordinator'");
    if($sql == true){
        header("Location: ./admin.php?hlm=koordinator");
        die();
    }
    }
}
?>
