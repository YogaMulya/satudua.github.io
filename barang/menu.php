<?php
    if( !empty( $_SESSION['id_user'] ) ){
    include "koneksi.php";
?>

<div class="navbar  navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="">Perpustakaan</a>
	</div>
	<div class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li><a href="./admin.php">Beranda</a></li>

        <?php
        if( $_SESSION['level'] == 3 ){
        ?>
		<li><a href="./admin.php?hlm=transaksi">Pengajuan</a></li>
		<li><a href="./admin.php?hlm=rekap">Rekap</a></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data<b class="caret"></b></a>
		  <ul class="dropdown-menu">
			<li><a href="./admin.php?hlm=barang">Data Barang</a></li>
			<li><a href="./admin.php?hlm=user">Data User</a></li>
			<li><a href="./admin.php?hlm=ruang">Data Ruang</a></li>
			<li><a href="./admin.php?hlm=satuan">Data Satuan</a></li>
			<li><a href="./admin.php?hlm=jenis">Data Jenis Barang</a></li>
			<li><a href="./admin.php?hlm=koordinator">Data Koordinator</a></li>
			<?php
			}

			?>


			<?php
			if( $_SESSION['level'] == 1 ){
				?>
				<li><a href="./admin.php?hlm=transaksi">Pengajuan</a></li>
			<?php
			}
			?>
<?php
			if( $_SESSION['level'] == 2 ){
				?>
				<li><a href="./admin.php?hlm=transaksi">Pengajuan</a></li>
			<?php
			}
			?>
			<?php
			if( $_SESSION['level'] == 4 ){
				?>
				<li><a href="./admin.php?hlm=transaksi">Pengajuan</a></li>
			<?php
			}
			?>
		  </ul>
		</li>

	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
			<?php echo $_SESSION['nama']; ?> <b class="caret"></b>
		  </a>
		  <ul class="dropdown-menu">
			<li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
	  </ul>
	</div>
  </div>
</div>
<?php
} else {
	header("Location: ./");
	die();
}
?>