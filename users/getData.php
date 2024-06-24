<?php 
include('../koneksi.php');
$sql ='SELECT * FROM users';
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_object($query)){
        //variable
        $data['status'] = 200;
        $data['result'][] = $row;
    }
} else {
    $data['status'] = 400;
    $data['result'] = 'Data not found';
}

print_r(json_encode($data))

?>