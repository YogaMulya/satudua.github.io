<?php
session_start();
if( empty( $_SESSION['id_user'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./admin.php');
	die();
} else {
	include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tugas Aplikasi pak hasan v1</title>
  
    <link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<style type="text/css">
	body {
	  min-height: 0px;
	  padding-top: 70px;
	}
   @media print {
	   .container {
		   margin-top: -30px;
	   }
	   #tombol,
      .noprint {
         display: none;
      }
   }

	
}
	</style>

  </head>

  <body>


    <?php include "menu.php"; ?>

    <div class="container">

	<?php
	if( isset($_REQUEST['hlm'] )){

		$hlm = $_REQUEST['hlm'];

		switch( $hlm ){
			case 'barang':
				include "barang.php";
				break;
			case 'user':
				include "user.php";
				break;
			case 'ruang':
				include "ruang.php";
				break;
			case 'transaksi':
				include "transaksi.php";
				break;
			case 'satuan':
				include "satuan.php";
				break;
			case 'jenis':
				include "jenis.php";
				break;
			case 'koordinator':
				include "koordinator.php";
				break;
				case 'rekap':
				include "rekap.php";
				break;
		}
	} else {
	?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>Selamat Datang di Aplikasi v1</h2>

        <p>Halo <strong><?php echo $_SESSION['nama']; ?></strong>, Anda login sebagai
			<strong>
			<?php
				if($_SESSION['level'] == 1){
					echo 'Admin.';
				}
				if($_SESSION['level'] == 3){
					echo 'Supervisor.';
				}
				if($_SESSION['level'] == 2) {
						echo 'User.';

				}
				if($_SESSION['level'] == 4) {
					echo 'Koor.';

			}
			?>
			</strong>
		</p>
      </div>
	<?php
	}
	?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript">
	function autofill() {
		var id_barang = $ ("#id_barang"). val ();
		$.ajax ({
			url : 'ajax.php',
			data : 'id_barang='+id_barang,
			success : (function(data){
			var json = data,
			obj = JSON.parse(json);
			$("#nama_barang").val (obj.nama_barang);
			$("#jenis_barang").val (obj.jenis_barang);
			$("#satuan").val (obj.satuan);
			$("#jumlah").val (obj.jumlah);
		})
		})
	}
</script>
<script type="text/javascript">
	function autofill2() {
		var nama_barang = $ ("#nama_barang"). val ();
		$.ajax ({
			url : 'ajax2.php',
			data : 'nama_barang='+nama_barang,
			success : (function(data1){
			var json = data1,
			obj1 = JSON.parse(json);
			$("#id_barang").val (obj1.id_barang);
			$("#jenis_barang").val (obj1.jenis_barang);
			$("#satuan").val (obj1.satuan);
			$("#jumlah").val (obj1.jumlah);
		})
		})
	}
</script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#nama_barang").autocomplete({
                source: "<?php echo 'source.php';?>"
            });
        });	
</script>
<!--  -->

  </body>

</html>
<?php
}
?>
