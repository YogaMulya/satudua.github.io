<?php
    if( empty( $_SESSION['id_user'] ) ){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header('Location: ./');
        die();
    }else {
        if( isset( $_REQUEST['aksi3'] )){
            $aksi3 = $_REQUEST['aksi3'];
            switch($aksi3){
                case 'koor':
                    include 'rekap_koor.php';
                    break;
                    case 'tahun':
                    include 'rekap_tahun.php';
                    break;
            }
        } else {
            

            $bulan_tahun = $_REQUEST['bulan_tahun'];
            $sql3 = mysqli_query($koneksi, "SELECT * from sub where bulan_tahun='$bulan_tahun'");
            $row2 = mysqli_fetch_array($sql3)
    ?>
    <form action="" class="form-inline" method="get">

    <h3 style="margin-bottom: -20px;">Pengajuan Barang Pada : <?= $row2['bulan_tahun']?></h3>
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
                        <th width="10%">Koordinator</th>
                        <th width="10%">Permintaan</th>
                        <th width="10%">Tindakan</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    $bulan_tahun = $_REQUEST['bulan_tahun'];
    $sql = mysqli_query($koneksi, "SELECT *, SUM(permintaan) FROM sub  where bulan_tahun='$bulan_tahun' group by koordinator");
    if(mysqli_num_rows($sql) > 0){
        $no = 0;
    
        while($row = mysqli_fetch_array($sql)){
            $no++;?>
            <tr>
            <td><?=$no?></td>
        <td><?=$row['koordinator']?></td>
        <td><?=$row['SUM(permintaan)']?></td>
        <td>
        <a href="?hlm=rekap&aksi2=detail&aksi3=koor&koordinator=<?=$row['koordinator']?>" class="btn btn-primary">detail</a>
        </td> 
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
    
    }
    ?>
