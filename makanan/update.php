<?php 

include('../koneksi.php');

$data = array();

$id = $_POST['id'];
$nama_makanan = $_POST['nama_makanan'];
$gambar = $_POST['gambar'];
$bahan = $_POST['bahan'];
$langkah = $_POST['langkah'];

if(!empty($id) && !empty($nama_makanan) && !empty($gambar) && !empty($bahan) && !empty($langkah)){
    $sql = "UPDATE makanan 
            SET nama='$nama_makanan', 
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