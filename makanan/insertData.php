<?php 
include('../koneksi.php');

$nama_makanan = $_POST['nama_makanan'];
$gambar = $_POST['gambar'];
$bahan = $_POST['bahan'];
$langkah = $_POST['langkah'];

$data = array();

if (!empty($nama_makanan) && !empty($gambar) && !empty($bahan) && !empty($langkah)) {
    $sqlCheck = "SELECT COUNT(*) FROM makanan WHERE nama_makanan ='$nama_makanan'";
    $queryCheck = mysqli_query($conn, $sqlCheck);
    $hasilCheck = mysqli_fetch_array($queryCheck);
    if ($hasilCheck[0] == 0){
        //jika data belum ada
        $sql = "INSERT INTO makanan(nama_makanan,gambar,bahan,langkah) VALUES ('$nama_makanan','$gambar','$bahan','$langkah')";
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