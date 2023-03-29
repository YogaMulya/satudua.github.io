<?php
if( empty( $_SESSION['id_user'] ) ){
    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {
        if( isset( $_REQUEST['aksi1'] )){
            $aksi1 = $_REQUEST['aksi1'];
            switch($aksi1){
                case 'hapus':
                    include 'sub_hapus.php';
                    break;
            }
        }
    if( isset( $_REQUEST['submit1'] )){
        $setuju = 1;
        $nota = $_REQUEST['nota'];
        $sql = mysqli_query($koneksi, "UPDATE transaksi SET setuju='$setuju' WHERE nota='$nota'");
        if ($sql == true) {
            header('Location: ./admin.php?hlm=transaksi');
                die();
            } else {
                echo 'ERROR! Periksa penulisan querynya';
            
        }
    }else {
        $nota = $_REQUEST['nota'];
        $sql3 = mysqli_query($koneksi, "SELECT * from transaksi where nota='$nota'");
        $row2 = mysqli_fetch_array($sql3)
?>
<form method="post" action="" class="form-inline" role="form">
<div ><br></div>
<div class="form-group">
<?php
?>
<input type="number" class="hidden" name="valid" id="valid" value="1">
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
   
    <form action="" method="post" role="form" class="form-inline">
                    <button class="btn btn-primary pull-right" name="submit1" id="submit1">Approve</button>
                    </div>
            
   <form method="post" action="" class="form-inline" role="form">
             
    <hr>
    <div ><input type="text" class="hidden" name="id_sub" id="id_sub"></div>
    </form>
                <div >
               
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
                   </tr>
                 </thead>
                 
                 <tbody>
                 <?php
                 $nota = $_REQUEST['nota'];
$sql = mysqli_query($koneksi, "SELECT * FROM sub where nota='$nota' ORDER BY nota DESC");
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
       <td>'.$row['setuju'].'</td>
';
    }
}
 
?>
 
                     </tr>
                     
                 </tbody>
                 
                 </div>
               
                 </div>
                 
    </form>
 
 
 
 
 
<?php
    }
}
?>
