<?php
if( empty( $_SESSION['id_user'] ) ){
    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {
	if( isset( $_REQUEST['vs'] )){
		$vs = $_REQUEST['vs'];
		switch($vs){
			case 'setuju':
				include 'valid_proses.php';
				break;
				case 'hapus':
				include 'valid_hapus.php';
				break;

		}
	}else {
        $nota = $_REQUEST['nota'];
        $sql3 = mysqli_query($koneksi, "SELECT * from transaksi where nota='$nota'");
        $row2 = mysqli_fetch_array($sql3)
?>
<form method="post" action="valid_proses.php" class="form-inline" role="form">
<div ><br></div>
<div class="form-group">
<?php
?>

        <label for="nota" class="col-sm-2 control-label">No. Nota</label>
        <div class="col-sm-2"><div class="col-sm-2">
        <input type="text" name="nota" id="nota" class="form-control" value="<?php  echo $row2['nota']?>" readonly>
        </div>
        </div>
       
        <div class="pull-right">
 
        <label for="koordinator" class="col-sm-4 control-label">Koordinator</label>
        <div class="col-sm-4">
        <h3>
        <?php echo $_SESSION['koordinator']; ?>
       
        </h3>
        </div>
    </div>
    </div>
    <div class="pull-right">
   
                    <button class="btn btn-primary pull-right" name="submit" id="submit">Selesai</button>
                    </div>
            
    <hr>
    
                <div >
               <form action="valid_proses.php" method="POST" role="form">
                <table class="table table-bordered">
                 <thead>
                   <tr class="info">
                     <th width="5%">No</th>
                     <th width="10%">Kode Barang</th>
                     <th width="22%">Nama Barang</th>
                     <th width="10%">Jenis</th>
                     <th width="10%">satuan</th>
                     <th width="10%">permintaan</th>
                     <th width="10%">Disetujui</th>
                     <th width="20%">Tindakan</th>
                   </tr>
                 </thead>
                 
                 <tbody>
                 <?php
                 $nota = $_REQUEST['nota'];
$sql = mysqli_query($koneksi, "SELECT * FROM sub where nota='$nota'");
if(mysqli_num_rows($sql) > 0){
    $no = 0;
 
    while($row = mysqli_fetch_array($sql)){
        $no++;
    echo '
 
      <tr>
        <td>'.$no.'</td>
        <td>'.$row['id_barang'].'</td>
        <td>'.$row['nama_barang'].'</td>
       <td>'.$row['jenis_barang'].'</td>
       <td>'.$row['satuan'].'</td>
       <td>'.$row['permintaan'].'</td>
       <td> 
       <input type="text" class="form-control " value="'.$row['setuju'].'"  name="setuju" id="setuju">
       
       </td>
        <td>';
        echo'
   
 
       <script type="text/javascript" language="JavaScript">
             function konfirmasi(){
                 tanya = confirm("Anda yakin akan menghapus data ini ?");
                 if (tanya == true) return true;
                 else return false;
           }
       </script>
        <a href="?hlm=transaksi&aksi=valid&setuju=setuju&submit=yes&id_sub='.$row['id_sub'].'" onclick="return konfirmasi()"  class="btn btn-success btn-s">Setuju</a>
        <a href="?hlm=transaksi&aksi=valid&vs=hapus&submit=yes&id_sub='.$row['id_sub'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
        </td>';
        
    }
}
 
?></tr>
 
                     
                     
                 </tbody>
                 </table>
                 </div>
                 </form>
                 </div>
                 
    </form>
 
 
 
 
 
<?php
    }
}
?>

<!-- ========================================================================================================== -->
<?php
if( empty( $_SESSION['id_user'] ) ){
    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {
	if( isset( $_REQUEST['vs'] )){
		$vs = $_REQUEST['vs'];
		switch($vs){
			case 'setuju':
				include 'valid_proses.php';
				break;
				case 'hapus':
				include 'valid_hapus.php';
				break;

		}
	}else {
        $nota = $_REQUEST['nota'];
        $sql3 = mysqli_query($koneksi, "SELECT * from transaksi where nota='$nota'");
        $row2 = mysqli_fetch_array($sql3)
?>
<form method="post" action="valid_proses.php" class="form-inline" role="form">
<div ><br></div>
<div class="form-group">
<?php
?>

        <label for="nota" class="col-sm-2 control-label">No. Nota</label>
        <div class="col-sm-2"><div class="col-sm-2">
        <input type="text" name="nota" id="nota" class="form-control" value="<?php  echo $row2['nota']?>" readonly>
        </div>
        </div>
       
        <div class="pull-right">
 
        <label for="koordinator" class="col-sm-4 control-label">Koordinator</label>
        <div class="col-sm-4">
        <h3>
        <?php echo $_SESSION['koordinator']; ?>
       
        </h3>
        </div>
    </div>
    </div>
    <div class="pull-right">
   
                    <button class="btn btn-primary pull-right" name="submit" id="submit">Selesai</button>
                    </div>
            
    <hr>
    
                <div >
               <form action="valid_proses.php" method="POST" role="form">
                <table class="table table-bordered">
                 <thead>
                   <tr class="info">
                     <th width="5%">No</th>
                     <th width="10%">Kode Barang</th>
                     <th width="22%">Nama Barang</th>
                     <th width="10%">Jenis</th>
                     <th width="10%">satuan</th>
                     <th width="10%">permintaan</th>
                     <th width="10%">Disetujui</th>
                     <th width="20%">Tindakan</th>
                   </tr>
                 </thead>
                 
                 <tbody>
                 <?php
                 $nota = $_REQUEST['nota'];
$sql = mysqli_query($koneksi, "SELECT * FROM sub where nota='$nota'");
if(mysqli_num_rows($sql) > 0){
    $no = 0;
 
    while($row = mysqli_fetch_array($sql)){
        $no++;
    echo '
 
      <tr>
        <td>'.$no.'</td>
        <td>'.$row['id_barang'].'</td>
        <td>'.$row['nama_barang'].'</td>
       <td>'.$row['jenis_barang'].'</td>
       <td>'.$row['satuan'].'</td>
       <td>'.$row['permintaan'].'</td>
       <td> 
       <input type="number" class="form-control" id="setuju" name="setuju" value="'.$row['setuju'].'" placeholder="Setuju">
       </td>
        <td>
   
 
       <script type="text/javascript" language="JavaScript">
             function konfirmasi(){
                 tanya = confirm("Anda yakin akan menghapus data ini ?");
                 if (tanya == true) return true;
                 else return false;
           }
       </script>
        <a href="?hlm=transaksi&aksi=valid&vs=setuju&setuju=20&submit=yes&id_sub='.$row['id_sub'].'"  class="btn btn-success btn-s">Setuju</a>
        <a href="?hlm=transaksi&aksi=valid&vs=hapus&submit=yes&id_sub='.$row['id_sub'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
        </td>';
        
    }
}
 
?></tr>
 
                     
                     
                 </tbody>
                 </table>
                 
                 </form>
                 </div>
                 
    </form>
 
 
 
 
 
<?php
    }
}
?>
<!-- ====================================== -->
<?php
    if( empty( $_SESSION['id_user'] ) ){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header('Location: ./');
        die();
    } else {
        if( isset( $_REQUEST['vs'] )){
            $vs = $_REQUEST['vs'];
            switch($vs){
                case 'setuju':
                    include 'valid_proses.php';
                    break;
                    case 'hapus':
                    include 'valid_hapus.php';
                    break;

            }
        }if(isset($_REQUEST['Setuju'])){
            $setuju = $_GET['setuju'];
            $id_sub = $_REQUEST['id_sub'];
        
            $sql = mysqli_query($koneksi, "UPDATE sub SET setuju='$setuju' WHERE id_sub='$id_sub'");
            if($sql == true){
                header("Location: ./admin.php?hlm=satuan");
                die();
            }
            }else {
            $nota = $_REQUEST['nota'];
            $sql3 = mysqli_query($koneksi, "SELECT * from transaksi where nota='$nota'");
            $row2 = mysqli_fetch_array($sql3)
    ?>
    <form method="get"class="form-inline" role="form">
    <div ><br></div>
    <div class="form-group">
    <?php
    ?>

            <label for="nota" class="col-sm-2 control-label">No. Nota</label>
            <div class="col-sm-2"><div class="col-sm-2">
            <input type="text" name="nota" id="nota" class="form-control" value="<?php  echo $row2['nota']?>" readonly>
            </div>
            </div>
        
            <div class="pull-right">
    
            <label for="koordinator" class="col-sm-4 control-label">Koordinator</label>
            <div class="col-sm-4">
            <h3>
            <?php echo $_SESSION['koordinator']; ?>
        
            </h3>
            </div>
        </div>
        </div>
        <div class="pull-right">
    
                    <a href="?hlm=transaksi" class="btn btn-primary">Selesai</a>
                        </div>
                
        <hr>
        
                    <div >
        
                    <table class="table table-bordered">
                    <thead>
                    <tr class="info">
                        <th width="5%">No</th>
                        <th width="10%">Kode Barang</th>
                        <th width="22%">Nama Barang</th>
                        <th width="10%">permintaan</th>
                        <th width="10%">satuan</th>
                        
                        <th width="10%">Disetujui</th>
                        <th width="20%">Tindakan</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    $nota = $_REQUEST['nota'];
    $sql = mysqli_query($koneksi, "SELECT * FROM sub where nota='$nota'");
    if(mysqli_num_rows($sql) > 0){
        $no = 0;
    
        while($row = mysqli_fetch_array($sql)){
            $no++;?>
            <tr>
            <td><?=$no?></td>
        <td><?=$row['id_barang']?></td>
        <td><?=$row['nama_barang']?></td>
        <td><?=$row['permintaan']?></td>
        <td><?=$row['satuan']?></td>
        <td><input type="number" class="form-control" name="setuju" id="setuju" value=""></td>
            <td><input type="submit" class="btn btn-success" name="Setuju" value="Setuju"></td>
            <?php
        }
    }
    
    ?>
    </tr>
    
                        
                        
                    </tbody>
                    </table>
                    
                   
                    </div>
                    
        </form>
    
    
    
    
    
    <?php
        }
    }
    ?>
