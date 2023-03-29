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
                    include 'edit_hapus.php';
                    break;
            }
        }
    if( isset( $_REQUEST['submit1'] )){
 
        $id_barang = $_REQUEST['id_barang'];
        $nama_barang = $_REQUEST['nama_barang'];
        $id_sub = $_REQUEST['id_sub'];
        $nota = $_REQUEST['nota'];
        $tanggal = date('Y-m-H');
        $jenis_barang = $_REQUEST['jenis_barang'];
        $satuan = $_REQUEST['satuan'];
        $permintaan = $_REQUEST['permintaan'];
        $nama = $_SESSION['nama'];
        $koordinator = $_SESSION['koordinator'];
        $id_user = $_SESSION['id_user'];
        $bulan = date("M");
        $tahun = date("Y");
        $bulan_tahun = date ("M-Y");
        $sql = mysqli_query($koneksi, "INSERT INTO sub (nota,id_barang,nama_barang,tanggal,jenis_barang,satuan,permintaan,nama,koordinator,id_user,bulan,tahun,bulan_tahun) VALUES ('$nota','$id_barang','$nama_barang','$tanggal','$jenis_barang','$satuan','$permintaan','$nama','$koordinator','$id_user','$bulan','$tahun','$bulan_tahun')");
        
        $nota = $_REQUEST['nota'];
        $sql4 = mysqli_query($koneksi, "SELECT * from transaksi where nota='$nota'");
        $row3 = mysqli_fetch_array($sql4);
        if($sql == true){
            header('Location: ./admin.php?hlm=transaksi&aksi=edit&nota='.$row3['nota'].'');
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
                    <a href="./admin.php?hlm=transaksi" class="btn btn-primary btn-s "><span class=" pull-right"> Selesai   </span></a>
                    </div>
                <br/><hr/>
                <form method="post" action="" class="form-inline" role="form">
                <div class="form-group">
        <label for="id_barang" class="col-sm-3 control-label">Kode Barang</label>
        <div class="col-sm-4">
            <input type="text" name="id_barang" class="form-control" id="id_barang"  placeholder="Masukkan Kode Barang" onkeyup="autofill()"  >
        </div>
    </div>
 
    <div class="form-group">
        <label for="nama_barang" class="col-sm-4 control-label">Nama Barang</label>
 
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" onkeyup="autofill2()" >
        </div>
    </div>
    <div class="form-group">
   
        <label for="permintaan" class="col-sm-4 control-label">Permintaan </label>
        <div class="col-sm-4">
            <input type="text" name="permintaan" class="form-control" id="permintaan" placeholder="Masukkan Jumlah" value=""  >
        </div>
    </div>
<hr>
    <div class="form-group">
        <label for="jenis_barang" class="col-sm-3 control-label">Jenis Barang</label>
        <div class="col-sm-4">
            <input type="text" name="jenis_barang" class="form-control" id="jenis_barang" value=""  placeholder="" readonly required>
        </div>
    </div>
 
    <div class="form-group">
        <label for="jumlah" class="col-sm-4 control-label">Jumlah Yang Tersedia</label>
 
        <div class="col-sm-4">
            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="-" value="" readonly required>
        </div>
    </div>
    <div class="form-group">
   
        <label for="satuan" class="col-sm-2 control-label">Satuan</label>
        <div class="col-sm-4">
            <input type="text" name="satuan" class="form-control" id="satuan" placeholder="-" value="" readonly required>
        </div>
    </div>
   
    <button type="submit" name="submit1" class="btn btn-success">Tambah</button>
    <hr>
    <div ><input type="text" class="hidden" name="id_sub" id="id_sub"></div>
    </form>
                <div >
               
                <table class="table table-bordered">
                 <thead>
                   <tr class="info">
                     <th width="5%">No</th>
                     <th width="10%">Nota</th>
                     <th width="10%">Kode Barang</th>
                     <th width="22%">Nama Barang</th>
                     <th width="10%">Jenis</th>
                     <th width="10%">satuan</th>
                     <th width="10%">permintaan</th>
                     <th width="20%">Tindakan</th>
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
        <td>'.$row['nota'].'</td>
        <td>'.$row['id_barang'].'</td>
        <td>'.$row['nama_barang'].'</td>
       <td>'.$row['jenis_barang'].'</td>
       <td>'.$row['satuan'].'</td>
       <td>'.$row['permintaan'].'</td>
        <td>';
        echo'
   
 
       <script type="text/javascript" language="JavaScript">
             function konfirmasi(){
                 tanya = confirm("Anda yakin akan menghapus data ini?");
                 if (tanya == true) return true;
                 else return false;
           }
       </script>
        <a href="?hlm=transaksi&aksi=edit&aksi1=hapus&submit=yes&id_sub='.$row['id_sub'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
        </td>';
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
