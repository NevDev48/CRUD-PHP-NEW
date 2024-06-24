<?php

include('../koneksi.php');

$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_object($query)) {
        $data['status'] = 200;
        $data['result'] = $row;
    }
} else {
    $data['status'] = 400;
    $data['result'] = 'Data Not FOund';
}

print_r(json_encode($data));

?>