<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);

$name_id = $data['id'];

include "config.php";

$sql = "SELECT * FROM name WHERE id = {$name_id}";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output, JSON_PRETTY_PRINT);
}else{
    echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}

?>