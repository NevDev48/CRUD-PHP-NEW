<?php 

include('../koneksi.php');

$id = $_POST['id'];

if (!empty($id)) {
 $sql = "DELETE FROM users WHERE id='$id'";
 $query = mysqli_query($conn, $sql);
 $data['status'] = 200;
 $data['result'] = 'Siuuuu';
} else {
 $data['status'] = 400;
 $data['result'] = 'Data not found';
}
print_r(json_encode($data));

?>