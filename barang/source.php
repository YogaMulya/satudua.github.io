<?php
$mysqli = new mysqli ('localhost','root','','its');
$term = $_GET['term'];
$sql = " SELECT nama_barang FROM barang WHERE nama_barang LIKE '%$term%'";
if (!$result = $mysqli->query($sql)) {
} else {
    $res = [];
    while ($row = $result->fetch_assoc()){
        //$id = $row['id'];
        $nama_barang = $row['nama_barang'];
        $res[] = $nama_barang;
    }
    header('Content-Type: application/json');
    echo json_encode($res);
}
?>