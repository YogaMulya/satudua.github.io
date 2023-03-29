<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_sub = $_REQUEST['id_sub'];

    $sql = mysqli_query($koneksi, "DELETE FROM sub WHERE id_sub='$id_sub'");

    $nota = $_REQUEST['nota'];
    $sql2 = mysqli_query($koneksi, "SELECT * from transaksi");
    $row = mysqli_fetch_array($sql2);
    if($sql == true){
        header('Location: ./admin.php?hlm=transaksi&aksi=edit&nota='.$row['nota'].'');
        die();
    }
   }
}
?>
