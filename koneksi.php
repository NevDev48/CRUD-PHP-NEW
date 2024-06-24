<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "resep_makanan";

$conn = mysqli_connect($hostname, $username, $password, $database);
if(!$conn){
    echo 'konseksi gagal';
}

?>