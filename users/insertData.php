<?php 
include('../koneksi.php');

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$data = array();

if (!empty($nama) && !empty($email) && !empty($password)) {
    $sqlCheck = "SELECT COUNT(*) FROM users WHERE nama ='$nama'";
    $queryCheck = mysqli_query($conn, $sqlCheck);
    $hasilCheck = mysqli_fetch_array($queryCheck);
    if ($hasilCheck[0] == 0){
        //jika data belum ada
        $password = md5($password);
        $sql = "INSERT INTO users(nama,email,password) VALUES ('$nama','$email','$password')";
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