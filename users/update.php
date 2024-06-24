<?php 

include('../koneksi.php');

$data = array();

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

if(!empty($id) && !empty($nama) && !empty($email) && !empty($password)){
    $sql = "UPDATE users 
            SET nama='$nama', 
            email='$email', 
            password='$password' 
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