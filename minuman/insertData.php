<?php 
include('../koneksi.php');

$nama_minuman = $_POST['nama_minuman'];
$gambar = $_POST['gambar'];
$bahan = $_POST['bahan'];
$langkah = $_POST['langkah'];

$data = array();

if (!empty($nama_minuman) && !empty($gambar) && !empty($bahan) && !empty($langkah)) {
    $sqlCheck = "SELECT COUNT(*) FROM minuman WHERE nama_minuman ='$nama_minuman'";
    $queryCheck = mysqli_query($conn, $sqlCheck);
    $hasilCheck = mysqli_fetch_array($queryCheck);
    if ($hasilCheck[0] == 0){
        //jika data belum ada
        $sql = "INSERT INTO minuman(nama_minuman,gambar,bahan,langkah) VALUES ('$nama_minuman','$gambar','$bahan','$langkah')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $data['status'] = 200;
            $data['message'] = 'Data Berhasil Disimpan';
        } else {
            $data['status'] = 400;
            $data['message'] = 'Data Gagal Disimpan';
        }
    } else {
        // jika data sudah ada
        $data['status'] = 400;
        $data['message'] = 'Data Sudah Ada';
    }
} else {
    $data['status'] = 400;
    $data['message'] = 'Data Tidak Boleh Kosong';
}

header('Content-Type: application/json');
echo json_encode($data);
?>