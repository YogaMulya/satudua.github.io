<?php
    if( empty( $_SESSION['id_user'] ) ){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header('Location: ./');
        die();
    }else {
        $koordinator = $_REQUEST['koordinator'];
        
    ?>
    <form action="" class="form-inline" method="get">

    <h3 style="margin-bottom: -20px;">Daftar Pengajuan Oleh : <?=$koordinator?> </h3>
        <div class="pull-right">
    
                    <a href="?hlm=rekap" class="btn btn-danger">Kembali</a>
                    
                        </div>
                <br>
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
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    $koordinator = $_REQUEST['koordinator'];
    $sql = mysqli_query($koneksi, "SELECT *, SUM(permintaan) FROM sub where  koordinator='$koordinator' group by id_barang");
    if(mysqli_num_rows($sql) > 0){
        $no = 0;
    
        while($row = mysqli_fetch_array($sql)){
            $no++;?>
            <tr>
            <td><?=$no?></td>
        <td><?=$row['id_barang']?></td>
        <td><?=$row['nama_barang']?></td>
        <td><?=$row['SUM(permintaan)']?></td>
        <td><?=$row['satuan']?></td>
        <td><?=$row['setuju']?></td>
        
 
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
