    <?php
    if( empty( $_SESSION['id_user'] ) ){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header('Location: ./');
        die();
    }	if( isset( $_REQUEST['aksi1'] )){
		$aksi1 = $_REQUEST['aksi1'];
		switch($aksi1){
			case 'valid':
				include 'valid_edit.php';
				break;

		}
	}  else {

            $nota = $_REQUEST['nota'];
            $sql3 = mysqli_query($koneksi, "SELECT * from transaksi where nota='$nota'");
            $row2 = mysqli_fetch_array($sql3)
    ?>
    <form action="" class="form-inline" method="GET">
    <div ><br></div>
    <div class="form-group">


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
    
                    <a href="?hlm=transaksi" class="btn btn-danger">Kembali</a>
                    
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
        <td><?=$row['setuju']?></td>
        
        <input type="text" class="form-control hidden" name="id_sub" value="<?=$row['id_sub']?>">
    </td><td>
    <a href="?hlm=transaksi&aksi=valid&aksi1=valid&id_sub=<?=$row['id_sub']?>" class="btn btn-success">Setujui</a>
    </td>
            
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
    ?>
