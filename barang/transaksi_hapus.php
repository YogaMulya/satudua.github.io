<?php
if( empty( $_SESSION['id_user'] ) ){

    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {

if(isset($_REQUEST['submit'])){

    $nota = $_REQUEST['nota'];

    $sql = mysqli_query($koneksi, "DELETE FROM transaksi WHERE nota='$nota'");
    $nota = $_REQUEST['nota'];

    $sql2 = mysqli_query($koneksi, "DELETE FROM sub WHERE nota='$nota'");
    if($sql == true){
        header("Location: ./admin.php?hlm=transaksi");
        die();
    }else {
        echo'error';
    }
    }
}
?>
