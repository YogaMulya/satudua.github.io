<?php
$host = 'localhost';
$username = 'root';
$pass = '';
$Dbname = 'its';
//connect with the database
$db = new mysqli($host,$username,$pass,$Dbname);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM barang WHERE barang LIKE '%".$searchTerm."%' ORDER BY id_barang ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['barang'];
}
//return json data
echo json_encode($data);
?>