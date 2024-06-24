<?php 

include('../koneksi.php');

$data = array();

$id = $_POST['id'];
$nama_minuman = $_POST['nama_minuman'];
$gambar = $_POST['gambar'];
$bahan = $_POST['bahan'];
$langkah = $_POST['langkah'];

if(!empty($id) && !empty($nama_minuman) && !empty($gambar) && !empty($bahan) && !empty($langkah)){
    $sql = "UPDATE minuman 
            SET nama='$nama_minuman', 
            gambar='$gambar', 
            bahan='$bahan',
            langkah='$langkah' 
            WHERE id='$id'";

    $query = mysqli_query($conn, $sql);
    if ($query) {
        if (mysqli_affected_rows($conn) > 0) {
            $data['status'] = 200;
            $data['result'] = 'Data Berhasil diubah';
        } else {
            $data['status'] = 400;
            $data['result'] = 'Data Gagal diubah';
        }
    } else {
        $data['status'] = 400;
        $data['result'] = 'Query Error: ' . mysqli_error($conn);
    }
} else {
    $data['status'] = 400;
    $data['result'] = 'Data tidak boleh kosong';
}

print_r(json_encode($data));
?>